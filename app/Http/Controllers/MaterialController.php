<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function publicIndex()
    {
        $materials = Material::latest()->get();
        return view('materials.material', compact('materials'));
    }

    public function index()
    {
        $materials = Material::latest()->paginate(10);
        // Points to your 'materialadmin' file inside the 'materials' folder
        return view('materials.materialadmin', compact('materials'));
    }



    public function create()
    {
        // Points to your 'create' file inside the 'materials' folder
        return view('materials.create');
    }

    public function store(Request $request)
    {
        $request->validate([ 'title' => 'required|string|max:255', 'url' => 'required|url|max:2048', ]);
        Material::create($request->only('title', 'url'));
        // Redirects to the new route name
        return redirect()->route('materials.index')->with('success', 'Material link created successfully.');
    }

    public function edit(Material $material)
    {
        // Points to your 'edit' file inside the 'materials' folder
        return view('materials.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([ 'title' => 'required|string|max:255', 'url' => 'required|url|max:2048', ]);
        $material->update($request->only('title', 'url'));
        // Redirects to the new route name
        return redirect()->route('materials.index')->with('success', 'Material link updated successfully.');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        // Redirects to the new route name
        return redirect()->route('materials.index')->with('success', 'Material link deleted successfully.');
    }
}
