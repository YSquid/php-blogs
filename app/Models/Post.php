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

    protected $fillable = ['title', 'body', 'user_id'];


    //this returns the relationship between a post, and a user
    //It says a Post belongs to an instance of the User class, related by user_id
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
