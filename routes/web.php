<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\EventRegistController;
use App\Http\Controllers\AnnouncementController;

Route::prefix('admin')->name('admin.')->group(function () {
// Route::prefix(prefix: 'admin')->name('admin.')->group(function () {
//Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // 📢 Announcements CRUD
    Route::prefix('announcement')->name('announcement.')->group(function () {
        Route::get('/', [AnnouncementController::class, 'index'])->name('index');
        Route::get('/create', [AnnouncementController::class, 'create'])->name('create');
        Route::post('/store', [AnnouncementController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AnnouncementController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [AnnouncementController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [AnnouncementController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', [EventController::class, 'adminIndex'])->name('index');
        Route::get('/create', [EventController::class, 'create'])->name('create');
        Route::post('/store', [EventController::class, 'store'])->name('store');
        Route::get('/{id}/show', [EventController::class, 'adminShow'])->name('show');
        Route::get('/{id}/edit', [EventController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [EventController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [EventController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('materials')->name('materials.')->group(function () {
        Route::get('/', [MaterialController::class, 'index'])->name('index');
        Route::get('/create', [MaterialController::class, 'create'])->name('create');
        Route::post('/store', [MaterialController::class, 'store'])->name('store');
        Route::get('/edit/{material}', [MaterialController::class, 'edit'])->name('edit');
        Route::put('/update/{material}', [MaterialController::class, 'update'])->name('update');
        Route::delete('/destroy/{material}', [MaterialController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('sermons')->name('sermons.')->group(function () {
        Route::get('/', [SermonController::class, 'adminIndex'])->name('index');
        Route::get('/create', [SermonController::class, 'create'])->name('create');
        Route::post('/store', [SermonController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SermonController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [SermonController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [SermonController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('statics')->name('statics.')->group(function () {
        Route::get('/', [StaticPageController::class, 'index'])->name('index');
        Route::get('/create', [StaticPageController::class, 'create'])->name('create');
        Route::post('/store', [StaticPageController::class, 'store'])->name('store');
        Route::get('/edit/{static}', [StaticPageController::class, 'edit'])->name('edit');
        Route::put('/update/{static}', [StaticPageController::class, 'update'])->name('update');
        Route::delete('/destroy/{static}', [StaticPageController::class, 'destroy'])->name('destroy');
    });
});
