<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;                   
use Illuminate\Support\Facades\Auth;           
use App\Models\Announce;                       
use Illuminate\Support\Facades\Redirect;    
use function view;
use function redirect;     

class AnnounceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $announces = Announce::when($search, function ($query, $search) {
            return $query->where('headline', 'LIKE', "%{$search}%")
                         ->orWhere('details', 'LIKE', "%{$search}%");
        })
        ->orderBy('upload_date', 'desc')
        ->paginate(10);

        return view('admin.announce.index', compact('announces', 'search'));
    }

    public function create()
    {
        return view('admin.announce.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'headline' => 'required|string|max:255',
            'upload_date' => 'required|date',
            'details' => 'required|string',
        ]);

        Announce::create([
            'user_id' => Auth::id(),
            'headline' => $request->headline,
            'upload_date' => $request->upload_date,
            'details' => $request->details,
        ]);

        return redirect()->route('admin.announces.index')
                         ->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $announce = Announce::findOrFail($id);
        return view('admin.announce.edit', compact('announce'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'headline' => 'required|string|max:255',
            'upload_date' => 'required|date',
            'details' => 'required|string',
        ]);

        $announce = Announce::findOrFail($id);
        $announce->update($request->only('headline', 'upload_date', 'details'));

        return redirect()->route('admin.announces.index')
                         ->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $announce = Announce::findOrFail($id);
        $announce->delete();

        return redirect()->route('admin.announces.index')
                         ->with('success', 'Pengumuman berhasil dihapus!');
    }
}
