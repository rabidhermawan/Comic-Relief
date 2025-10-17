<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;

// Main screen
Route::get('/', [ComicController::class, 'index']);

//For comics stuff
Route::get('/search', function () {
    return view('comic.search');
});

Route::get('/upload', [ComicController::class, 'upload'])->name('comic.upload');

Route::get('/comic/{id}', [ComicController::class, 'details'])->name('comic.detail');

Route::get('/comic/{id}/read/{pagenum}', [ComicController::class, 'read'])->name('comic.read');


//For account stuff
Route::get('/profile', function () {
    return view('account.profile');
});
