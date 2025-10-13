<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StaticPageController;

// === PUBLIC ROUTES ===
Route::get('/materialview', [MaterialController::class, 'publicIndex'])->name('materials.public');
Route::get('/sermons', [SermonController::class, 'index'])->name('sermons.public');
Route::get('/static', [StaticPageController::class, 'publicIndex'])->name('statics.public');

Route::get('/logout', function () {
return redirect('/');
})->name('logout');


// === ADMIN ROUTES ===
Route::prefix('admin')->name('admin.')->group(function () {

    // MATERIAL ADMIN
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/materials/create', [MaterialController::class, 'create'])->name('materials.create');
    Route::post('/materials/insert', [MaterialController::class, 'store'])->name('materials.insert');
    Route::get('/materials/edit/{material}', [MaterialController::class, 'edit'])->name('materials.edit');
    Route::put('/materials/update/{material}', [MaterialController::class, 'update'])->name('materials.update');
    Route::delete('/materials/destroy/{material}', [MaterialController::class, 'destroy'])->name('materials.destroy');

    // STREAM ADMIN
    Route::prefix('sermons')->name('sermons.')->group(function () {
        Route::get('/', [SermonController::class, 'adminIndex'])->name('index');
        Route::get('/create', [SermonController::class, 'create'])->name('create');
        Route::post('/store', [SermonController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SermonController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [SermonController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [SermonController::class, 'destroy'])->name('destroy');
    });

    // STATIC ADMIN
    Route::prefix('statics')->name('statics.')->group(function () {
        Route::get('/', [StaticPageController::class, 'index'])->name('index');
        Route::get('/create', [StaticPageController::class, 'create'])->name('create');
        Route::post('/store', [StaticPageController::class, 'store'])->name('store');
        Route::get('/edit/{static}', [StaticPageController::class, 'edit'])->name('edit');
        Route::put('/update/{static}', [StaticPageController::class, 'update'])->name('update');
        Route::delete('/destroy/{static}', [StaticPageController::class, 'destroy'])->name('destroy');
    });

});