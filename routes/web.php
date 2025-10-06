<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StaticPageController;


// Public facing route
Route::get('/materialview', [MaterialController::class, 'publicIndex'])->name('materials.public');

// --- ADMIN ROUTES (Manual Definition) ---
Route::prefix('admin')->name('admin.')->group(function () {

    // Route names will now be materials.index, materials.create, etc. (NO 'admin.' prefix)
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/materials/create', [MaterialController::class, 'create'])->name('materials.create');
    Route::post('/materials/insert', [MaterialController::class, 'store'])->name('materials.insert');
    Route::get('/materials/edit/{material}', [MaterialController::class, 'edit'])->name('materials.edit');
    Route::put('/materials/update/{material}', [MaterialController::class, 'update'])->name('materials.update');
    Route::delete('/materials/destroy/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');



    // STREAMING ADMIN
    Route::prefix('sermons')->name('sermons.')->group(function () {
        Route::get('/', [SermonController::class, 'adminIndex'])->name('index');
        Route::get('/create', [SermonController::class, 'create'])->name('create');
        Route::post('/store', [SermonController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SermonController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [SermonController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [SermonController::class, 'destroy'])->name('destroy');
    });
});

Route::get('/sermons', [SermonController::class, 'index'])->name('sermons.public');


// berikut ini routes untuk static (instagram-post)
// publik (untuk tampil di website)

Route::get('/static', [StaticPageController::class, 'publicIndex'])->name('statics.public');

// admin CRUD
Route::prefix('admin')->group(function () {
    Route::get('/statics', [StaticPageController::class, 'index'])->name('statics.index');
    Route::get('/statics/create', [StaticPageController::class, 'create'])->name('statics.create');
    Route::post('/statics/store', [StaticPageController::class, 'store'])->name('statics.store');
    Route::get('/statics/edit/{static}', [StaticPageController::class, 'edit'])->name('statics.edit');
    Route::put('/statics/update/{static}', [StaticPageController::class, 'update'])->name('statics.update');
    Route::delete('/statics/destroy/{static}', [StaticPageController::class, 'destroy'])->name('statics.destroy');
});