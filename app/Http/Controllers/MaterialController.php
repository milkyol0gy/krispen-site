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
     * DataTables.js handles pagination on the front-end.
     */
    public function index()
    {
        // FIXED: Switched from paginate() to get() to send all data to DataTables.
        // The DataTables library will handle search and pagination in the browser.
        $materials = Material::latest('published_date')->get();
        return view('materials.materialadmin', compact('materials'));
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
