<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    // Returns all comics in Database
    public function index() {
        $comics = Comic::orderBy('created_at', 'asc')->get();

        return view('index', ['comics' => $comics]);
    }

    //Show selected comics
    public function show($id) {

    }

    // Create comic entry, should calls ComicPage model too (WIP man.....)
    public function store() {
    
    }
}