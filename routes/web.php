<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\AuthController;

// Main screen
Route::get('/', [ComicController::class, 'index'])->name('comic.index');

//For account stuff
Route::middleware('guest')->controller(AuthController::class)->group(function() {
    Route::post('/logout','logout')->name('auth.logout');

    Route::get('/register','registerShow')->name('auth.registerPage');
    Route::post('/register','register')->name('auth.register');

    Route::get('/login','loginShow')->name('auth.loginPage');
    Route::post('/login','login')->name('auth.login');
});


Route::middleware('auth')->controller(ComicController::class)->group(function( ){
    Route::get('/upload', 'upload')->name('comic.upload')->middleware('auth');
    Route::post('/comic/store', 'store')->name('comic.store');

    Route::delete('/comic/{comic}', 'delete')->name('comic.delete');

    Route::get('/comic/update/{comic}', 'update')->name('comic.update');
    Route::post('/comic/{comic}/push-update', 'pushUpdate')->name('comic.pushUpdate');
});


//Search
Route::get('/search', [ComicController::class, 'search'])->name('comic.search');
Route::get('/getSearch', [ComicController::class, 'getSearch'])->name('comic.getSearch');


// For reading comics
Route::get('/comic/{comic}', [ComicController::class, 'details'])->name('comic.detail');
Route::get('/comic/{id}/read/{page_number}', [ComicController::class, 'read'])->name('comic.read');






