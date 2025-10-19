<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComicPage extends Model
{
    /** @use HasFactory<\Database\Factories\ComicPageFactory> */
    use HasFactory;

    protected $fillable = ['comic_id', 'page_number', 'filename'];
}
