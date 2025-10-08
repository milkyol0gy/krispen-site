<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
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

    public function adminIndex()
    {
        $events = Event::orderBy('start_time', 'desc')->get();
        return view('admin.events.index', compact('events'));
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
}
