<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use App\Models\Announcement;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    // Halaman publik
    public function publicIndex()
    {
        $statics = StaticPage::latest()->take(3)->get();
        $announcements = Announcement::latest()->take(3)->get();
        return view('static.static', compact('statics', 'announcements'));
    }

    public function visiMisi()
    {
        return view('visimisi');
    }
    public function main()
    {
        $statics = StaticPage::latest()->take(3)->get();
        $announcements = Announcement::latest()->take(3)->get();
        return view('static.static', compact('statics', 'announcements'));
    }

    // Admin index
    public function index(Request $request)
    {
        $query = StaticPage::query();
        
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where('title', 'LIKE', "%{$search}%");
        }
        
        $statics = $query->latest()->paginate(10);
        $search = $request->get('search');
        
        return view('admin.static.list', compact('statics', 'search'));
    }

    public function create()
    {
        return view('admin.static.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'embed_code' => 'required|string',
        ]);

        if (StaticPage::count() >= 3) {
            return redirect()->route('admin.statics.index')->with('error', 'Maksimal hanya 3 post.');
        }

        StaticPage::create($request->only(['title', 'embed_code']));
        return redirect()->route('admin.statics.index')->with('success', 'Post berhasil ditambahkan.');
    }

    public function edit(StaticPage $static)
    {
        return view('admin.static.edit', compact('static'));
    }

    public function update(Request $request, StaticPage $static)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'embed_code' => 'required|string',
        ]);

        $static->update($request->only(['title', 'embed_code']));
        return redirect()->route('admin.statics.index')->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy(StaticPage $static)
    {
        $static->delete();
        return redirect()->route('admin.statics.index')->with('success', 'Post berhasil dihapus.');
    }
}