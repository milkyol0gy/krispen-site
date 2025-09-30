<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

// Public facing route
Route::get('/materialview', [MaterialController::class, 'publicIndex'])->name('materials.public');

// --- ADMIN ROUTES (Manual Definition) ---
Route::prefix('admin')->group(function () {

    // Route names will now be materials.index, materials.create, etc. (NO 'admin.' prefix)
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/materials/create', [MaterialController::class, 'create'])->name('materials.create');
    Route::post('/materials/insert', [MaterialController::class, 'store'])->name('materials.insert');
    Route::get('/materials/edit/{material}', [MaterialController::class, 'edit'])->name('materials.edit');
    Route::put('/materials/update/{material}', [MaterialController::class, 'update'])->name('materials.update');
    Route::delete('/materials/destroy/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');

});
