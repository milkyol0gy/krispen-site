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
        $query = SermonRecord::query();
        
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('youtube_link', 'LIKE', "%{$search}%");
            });
        }
        
        $sermons = $query->orderBy('created_at', 'desc')->paginate(10);
        $search = $request->get('search');
        
        return view('admin.stream.stream-list', compact('sermons', 'search'));
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
            'description'  => 'nullable|string|max:2000',
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
            'description'  => 'nullable|string|max:2000',
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
