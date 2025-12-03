<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Prayer;
use App\Models\RoomBook;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('start_time', 'asc')->get();
        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }
    
    public function show_room_booking(Request $request)
    {
        $query = RoomBook::query();
        
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('user_name', 'LIKE', "%{$search}%")
                  ->orWhere('event_name', 'LIKE', "%{$search}%")
                  ->orWhere('facilitator_name', 'LIKE', "%{$search}%");
            });
        }
        
        $bookings = $query->orderBy('event_date', 'desc')->paginate(10);
        $search = $request->get('search');
        
        return view('admin.room-booking', compact('bookings', 'search'));
    }

    public function show_prayer_list(Request $request)
    {
        $query = Prayer::query();
        
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where('description', 'LIKE', "%{$search}%");
        }
        
        $prayers = $query->orderBy('created_at', 'desc')->paginate(10);
        $search = $request->get('search');
        
        return view('admin.prayer-list', compact('prayers', 'search'));
    }



    public function adminIndex(Request $request)
    {
        $query = Event::query();

        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        $events = $query->orderBy('start_time', 'desc')->paginate(10);
        
        return view('admin.events.index', compact('events'));
    }

    public function adminShow(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        
        $search = $request->get('search');
        
        $registrationsQuery = $event->eventRegists();
        
        if ($search) {
            $registrationsQuery->where(function($query) use ($search) {
                $query->where('attandee_name', 'like', '%' . $search . '%')
                      ->orWhere('inviter_name', 'like', '%' . $search . '%')
                      ->orWhere('attandee_phone', 'like', '%' . $search . '%');
            });
        }
        
        $registrations = $registrationsQuery->orderBy('created_at', 'desc')->paginate(10);
        $registrations->appends(['search' => $search]);
        
        return view('admin.events.show', compact('event', 'registrations', 'search'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after:start_time',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['title', 'description', 'start_time', 'end_time']);

        if ($request->hasFile('poster')) {
            $poster = $request->file('poster');
            $filename = time() . '_' . $poster->getClientOriginalName();
            $path = $poster->storeAs('events', $filename, 'public');
            $data['poster_link'] = $path;
        }

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date|after:start_time',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $event = Event::findOrFail($id);
        $data = $request->only(['title', 'description', 'start_time', 'end_time']);

        if ($request->hasFile('poster')) {
            if ($event->poster_link && Storage::disk('public')->exists($event->poster_link)) {
                Storage::disk('public')->delete($event->poster_link);
            }

            $poster = $request->file('poster');
            $filename = time() . '_' . $poster->getClientOriginalName();
            $path = $poster->storeAs('events', $filename, 'public');
            $data['poster_link'] = $path;
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->poster_link && Storage::disk('public')->exists($event->poster_link)) {
            Storage::disk('public')->delete($event->poster_link);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus!');
    }

    public function exportParticipants($id)
    {
        $event = Event::findOrFail($id);
        $participants = $event->eventRegists;
        
        $filename = 'participants_' . str_replace(' ', '_', $event->title) . '_' . date('Y-m-d') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($participants, $event) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, ['No', 'Name', 'Phone', 'Event Title', 'Registration Date']);
            
            // Add data rows
            $counter = 1;
            foreach ($participants as $participant) {
                fputcsv($file, [
                    $counter++,
                    $participant->attandee_name,
                    $participant->attandee_phone ?? 'N/A',
                    $event->title,
                    $participant->created_at->format('d/m/Y H:i')
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }

    public function exportPrayerList(Request $request)
    {
        $query = Prayer::query();
        
        // Apply date range filter
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        
        $prayers = $query->orderBy('created_at', 'desc')->get();
        
        $filename = 'prayer_list_' . date('Y-m-d') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($prayers) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, ['No', 'Prayer Request', 'Submit Date']);
            
            // Add data rows
            $counter = 1;
            foreach ($prayers as $prayer) {
                fputcsv($file, [
                    $counter++,
                    $prayer->description,
                    $prayer->created_at->format('d/m/Y H:i')
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}
