<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;

Route::get('/', [ComicController::class, 'index']);

//For comics stuff
Route::get('/comicsearch', function () {
    return view('comic.search');
});

Route::get('/comicupload', function () {
    return view('comic.upload');
});

Route::get('/comic/{id}', function ($id) {
    
    return view('comic.view', ["id" => $id]);
});

//For account stuff
Route::get('/profile', function () {
    return view('account.profile');
});
