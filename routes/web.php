<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;

// Main screen
Route::get('/', [ComicController::class, 'index'])->name('comic.index');

//Search
Route::get('/search', [ComicController::class, 'search'])->name('comic.search');

//Upload comic
Route::get('/upload', [ComicController::class, 'upload'])->name('comic.upload');
Route::post('/', [ComicController::class, 'store'])->name('comic.store');

// For reading comics
Route::get('/comic/{id}', [ComicController::class, 'details'])->name('comic.detail');
Route::get('/comic/{id}/read/{page_number}', [ComicController::class, 'read'])->name('comic.read');


//For account stuff
Route::get('/profile', function () {
    return view('account.profile');
});
