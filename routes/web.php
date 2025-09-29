<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SermonController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sermons', [SermonController::class, 'index'])->name('sermons.index');
