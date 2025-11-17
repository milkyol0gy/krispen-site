<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement; 
use Illuminate\Support\Facades\Redirect;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $announcements = Announcement::when($search, function ($query, $search) {
            return $query->where('headline', 'LIKE', "%{$search}%")
                         ->orWhere('details', 'LIKE', "%{$search}%");
        })
        ->orderBy('upload_date', 'desc')
        ->paginate(10);

        return view('admin.announcement.index', compact('announcements', 'search'));
    }

    public function create()
    {
        return view('admin.announcement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'headline' => 'required|string|max:255',
            'upload_date' => 'required|date',
            'details' => 'required|string',
        ]);

        Announcement::create([
            'user_id' => Auth::id(),
            'headline' => $request->headline,
            'upload_date' => $request->upload_date,
            'details' => $request->details,
        ]);

        return redirect()->route('admin.announcement.index')
                         ->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('admin.announcement.edit', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'headline' => 'required|string|max:255',
            'upload_date' => 'required|date',
            'details' => 'required|string',
        ]);

        $announcement = Announcement::findOrFail($id);
        $announcement->update($request->only('headline', 'upload_date', 'details'));

        return redirect()->route('admin.announcement.index')
                         ->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('admin.announcement.index')
                         ->with('success', 'Pengumuman berhasil dihapus!');
    }
}