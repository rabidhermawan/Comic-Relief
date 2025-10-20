<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\AuthController;

// Main screen
Route::get('/', [ComicController::class, 'index'])->name('comic.index');

Route::post('/logout',[AuthController::class, 'logout'])->name('auth.logout');
//For account stuff
Route::middleware('guest')->controller(AuthController::class)->group(function() {
    Route::get('/register','registerShow')->name('auth.registerPage');
    Route::post('/register','register')->name('auth.register');

    Route::get('/login','loginShow')->name('auth.loginPage');
    Route::post('/login','login')->name('auth.login');
});


Route::middleware('auth')->controller(ComicController::class)->group(function() {
    Route::get('/upload', 'upload')->name('comic.upload');
    Route::post('/comic/store', 'store')->name('comic.store');

    Route::delete('/comic/{comic}', 'delete')->name('comic.delete')->middleware('can:modify-comic,comic');;

    Route::get('/comic/update/{comic}', 'update')->name('comic.update');
    Route::post('/comic/{comic}/push-update', 'pushUpdate')->name('comic.pushUpdate')->middleware('can:modify-comic,comic');;
});


//Search
Route::get('/search', [ComicController::class, 'search'])->name('comic.search');
Route::get('/getSearch', [ComicController::class, 'getSearch'])->name('comic.getSearch');


// For reading comics
Route::get('/comic/{comic}', [ComicController::class, 'details'])->name('comic.detail');
Route::get('/comic/{id}/read/{page_number}', [ComicController::class, 'read'])->name('comic.read');






