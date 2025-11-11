<?php

namespace App\Http\Controllers;

use App\Models\Prayer;
use Illuminate\Http\Request;

class PrayerController extends Controller
{
    public function index()
    {
        return view('main.prayer.request');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'required|string|max:1000'
        ]);

        Prayer::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'Permohonan doa Anda telah berhasil dikirim.');
    }
}