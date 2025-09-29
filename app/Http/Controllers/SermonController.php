<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
