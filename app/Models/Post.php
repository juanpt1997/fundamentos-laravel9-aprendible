<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* ===================================================
    ? model => Post
    ? table => 'posts'
===================================================*/
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ];

    // protected $table = 'articles'; // ? En el caso de tener una tabla con nombre diferente
}