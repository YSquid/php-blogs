<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//we made this modle with php artisan make:model Post
//Note the name Post was chosen to correspond to DB table posts - always using uppercase singular version of DB table name
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'author',
        'hero_image',
        'body_1',
        'image_2',
        'body_2',
        'preview_text'
    ];
}
