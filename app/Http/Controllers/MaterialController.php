<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMaterialRequest; // Using the Form Request for validation

class MaterialController extends Controller
{
    /**
     * Display a paginated list of materials for the public.
     */
    public function publicIndex()
    {
        // FIXED: The public page should use server-side pagination.
        $materials = Material::latest('published_date')->paginate(12);
        return view('materials.material', compact('materials'));
    }

    /**
     * Display materials for the admin panel.
     */
    public function index(Request $request)
    {
        $query = Material::query();
        
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }
        
        $materials = $query->latest('published_date')->paginate(10);
        $search = $request->get('search');
        
        return view('materials.materialadmin', compact('materials', 'search'));
    }

    /**
     * Show the form for creating a new material.
     */
    public function create()
    {
        return view('materials.create');
    }

    /**
     * Store a newly created material in storage.
     */
    public function store(StoreMaterialRequest $request)
    {
        Material::create($request->validated());
        return redirect()->route('admin.materials.index')->with('success', 'Material link created successfully.');
    }

    /**
     * Show the form for editing the specified material.
     */
    public function edit(Material $material)
    {
        return view('materials.edit', compact('material'));
    }

    /**
     * Update the specified material in storage.
     */
    public function update(StoreMaterialRequest $request, Material $material)
    {
        $material->update($request->validated());
        return redirect()->route('admin.materials.index')->with('success', 'Material link updated successfully.');
    }

    /**
     * Remove the specified material from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('admin.materials.index')->with('success', 'Material link deleted successfully.');
    }
}
