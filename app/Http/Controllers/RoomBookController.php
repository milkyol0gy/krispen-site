<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomBook;

class RoomBookController extends Controller
{
    public function index()
    {

        return view('main.room-book.room-book');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaPeminjam' => 'required|string|max:255',
            'namaPKS'      => 'required|string|max:255',
            'acara'        => 'required|string|max:255',
            'jumlahOrang'  => 'required|integer',
            'hari'         => 'required|string|max:100',
            'tanggal'      => 'required|date',
            'jam'          => 'required',
            'peralatan'    => 'required|string|max:255',
        ]);

        RoomBook::create([
            'user_name' => $validated['namaPeminjam'],
            'facilitator_name'      => $validated['namaPKS'],
            'event_name'         => $validated['acara'],
            'number_of_people'  => $validated['jumlahOrang'] ?? null,
            'event_date'       => $validated['tanggal'] ?? null,
            'start_time'           => $validated['jam'] ?? null,
            'required_equipment'     => $validated['peralatan'] ?? null,
        ]);

        

        return redirect()
            ->route('sermons.public')
            ->with('success', 'Streaming has been added successfully.');
    }
}
