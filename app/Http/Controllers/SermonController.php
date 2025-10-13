<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SermonRecord;

class SermonController extends Controller
{
    public function index()
    {
        $sermons = \DB::table('sermon_records')
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


    public function adminIndex()
    {
    $sermons = \DB::table('sermon_records')
        ->orderBy('created_at','desc')
        ->get()
        ->map(function($s){
            parse_str(parse_url($s->youtube_link, PHP_URL_QUERY) ?? '', $q);
            $s->youtube_id = $q['v'] ?? null;
            $s->date = \Carbon\Carbon::parse($s->created_at)->format('d M Y');
            return $s;
        });

    return view('admin.stream.stream-list', [
        'sermons' => $sermons,
        'sermonsJson' => $sermons->toJson()
    ]);
    }

    public function create()
    {
        return view('admin.streamings.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title'         => 'required|string|max:255',
            'youtube_link'  => 'required|url'
        ]);

        // Create new streaming record
        SermonRecord::create([
            'title'        => $request->title,
            'youtube_link' => $request->youtube_link
        ]);

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
        // Validate input
        $request->validate([
            'title'         => 'required|string|max:255',
            'youtube_link'  => 'required|url'
        ]);

        $streaming = SermonRecord::findOrFail($id);
        $streaming->update([
            'title'        => $request->title,
            'youtube_link' => $request->youtube_link
        ]);
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
