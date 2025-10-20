<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;

// Main screen
Route::get('/', [ComicController::class, 'index'])->name('comic.index');

//Search
Route::get('/search', [ComicController::class, 'search'])->name('comic.search');
Route::get('/getSearch', [ComicController::class, 'getSearch'])->name('comic.getSearch');

// Action in comics
Route::get('/upload', [ComicController::class, 'upload'])->name('comic.upload');
Route::post('/comic/store', [ComicController::class, 'store'])->name('comic.store');

Route::delete('/comic/{comic}', [ComicController::class, 'delete'])->name('comic.delete');

Route::get('/comic/update/{comic}', [ComicController::class, 'update'])->name('comic.update');
Route::post('/comic/{comic}/push-update', [ComicController::class, 'pushUpdate'])->name('comic.pushUpdate');


// For reading comics
Route::get('/comic/{comic}', [ComicController::class, 'details'])->name('comic.detail');
Route::get('/comic/{id}/read/{page_number}', [ComicController::class, 'read'])->name('comic.read');


//For account stuff
Route::get('/profile', function () {
    return view('account.profile');
});
