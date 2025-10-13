<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    // Halaman publik
    public function publicIndex()
    {
        $statics = StaticPage::latest()->take(3)->get();
        return view('static.static', compact('statics'));
    }

    // Admin index
    public function index()
    {
        $statics = StaticPage::latest()->get();
        $count = StaticPage::count();
        return view('static.static-admin', compact('statics', 'count'));
    }

    public function create()
    {
        $count = StaticPage::count();
        if ($count >= 3) {
            return redirect()->route('admin.statics.index')->with('error', 'Maksimal hanya 3 post.');
        }
        return view('static.crud.create');
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
        return view('static.crud.edit', compact('static'));
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