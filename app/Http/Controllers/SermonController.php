<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SermonRecord;
use Carbon\Carbon;

class SermonController extends Controller
{
    public function index()
    {
        $sermons = DB::table('sermon_records')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->map(function ($sermon) {
                $parsed = parse_url($sermon->youtube_link);
                parse_str($parsed['query'] ?? '', $query);
                $sermon->youtube_id = $query['v'] ?? null;

                return $sermon;
            });

        $featured = $sermons->first();
        $others   = $sermons->skip(1);


        return view('main.stream.stream-list', compact('featured', 'others'));
    }

    public function adminIndex(Request $request)
   {
        $search = $request->input('search');

        // base query for display
        $query = DB::table('sermon_records');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('youtube_link', 'like', "%{$search}%");
            });
        }

        $sermons = $query->orderBy('created_at', 'desc')
                        ->paginate(10)
                        ->appends(['search' => $search]);

        // transform each sermon (for current table)
        $sermons->getCollection()->transform(function ($s) {
            parse_str(parse_url($s->youtube_link, PHP_URL_QUERY) ?? '', $q);
            $s->youtube_id = $q['v'] ?? null;
            $s->date = \Carbon\Carbon::parse($s->created_at)->format('d M Y');
            return $s;
        });

        // fetch latest 10 sermons (unfiltered) for preview
        $recent = DB::table('sermon_records')
                    ->orderBy('created_at', 'desc')
                    ->limit(11)
                    ->get()
                    ->map(function ($s) {
                        parse_str(parse_url($s->youtube_link, PHP_URL_QUERY) ?? '', $q);
                        $s->youtube_id = $q['v'] ?? null;
                        $s->date = \Carbon\Carbon::parse($s->created_at)->format('d M Y');
                        return $s;
                    });

        return view('admin.stream.stream-list', [
            'sermons' => $sermons,
            'sermonsJson' => $sermons->getCollection()->values()->toJson(),
            'recentJson' => $recent->toJson(),
        ]);
    }

    public function create()
    {
        return view('admin.streamings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'youtube_link' => 'required|url',
            'description'  => 'required|string|max:2000',
        ]);

        SermonRecord::create($validated);

        return redirect()
            ->route('admin.sermons.index')
            ->with('success', 'Streaming has been added successfully.');
    }

        /**
         * Show edit form (optional if you use modal)
         */
    public function edit($id)
    {
        $streaming = SermonRecord::findOrFail($id);
        return view('admin.sermons.edit', compact('streaming'));
    }

        /**
         * Update existing stream
         */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'youtube_link' => 'required|url',
            'description'  => 'required|string|max:2000',
        ]);

        $streaming = SermonRecord::findOrFail($id);
        $streaming->update($validated);

        return redirect()
            ->route('admin.sermons.index')
            ->with('success', 'Streaming has been updated successfully.');
    }

        /**
         * Delete a stream
         */
    public function destroy($id)
    {
        $streaming = SermonRecord::findOrFail($id);
        $streaming->delete();

        return redirect()
            ->route('admin.sermons.index')
            ->with('success', 'Streaming has been deleted successfully.');
    }
}
