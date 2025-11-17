<?php

namespace App\Http\Controllers;

use App\Models\CellCommunity;
use Illuminate\Http\Request;

class CellCommunityController extends Controller
{
    public function index()
    {
        $cellCommunities = CellCommunity::latest()->get();
        return view('main.cell-community.schedule', compact('cellCommunities'));
    }

    public function adminIndex(Request $request)
    {
        $query = CellCommunity::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%")
                  ->orWhere('facilitator_name', 'like', "%{$search}%");
        }

        $cellCommunities = $query->latest()->paginate(10);
        return view('admin.cell-community.index', compact('cellCommunities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'facilitator_name' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'meeting_schedule' => 'required|string|max:255',
        ]);

        CellCommunity::create($request->all());

        return redirect()->route('admin.cell-communities.index')
                        ->with('success', 'Cell Community created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'facilitator_name' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'meeting_schedule' => 'required|string|max:255',
        ]);

        $cellCommunity = CellCommunity::findOrFail($id);
        $cellCommunity->update($request->all());

        return redirect()->route('admin.cell-communities.index')
                        ->with('success', 'Cell Community updated successfully.');
    }

    public function destroy($id)
    {
        $cellCommunity = CellCommunity::findOrFail($id);
        $cellCommunity->delete();

        return redirect()->route('admin.cell-communities.index')
                        ->with('success', 'Cell Community deleted successfully.');
    }
}