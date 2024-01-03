<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     $posts = [];
//     //built in check method on auth sees if user is logged in
//     if (auth()->check()) {
//         //checks the authenticated user, called userPosts method on Post Model, calls built in latest and get methods
//         $posts = auth()->user()->userPosts()->latest()->get();
//     }

//     return view('home', ['posts' => $posts]);
// });

//AUTH ROUTES
Route::get('/login', function() {
    return view('admin.login');
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);
//

//SESSSION CONTROLLER

Route::post('/update-session', [SessionController::class, 'updateSession']);

//ADMIN PANEL ROUTES

Route::get('/admin', function() {
    if (auth()->check()) {
    return view('admin.admin-home');
    } 

    return view('admin.login');
});


//BASE ROUTE

Route::get('/', function() {
    $tags = (new TagsController()) -> index();
    $posts = (new PostController()) -> index();
    return view('home', ['tags' => $tags, 'posts' => $posts]);
});

//BLOG POST ROUTES

Route::get('/post/{id}', [PostController::class, 'showPost']);

Route::get('/create-post', function() {
    return view('admin.posts.create-post');
});
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}',[PostController::class, 'deletePost']);


//TAG ROUTES

Route::get('/create-tag', function() {
    return view('admin.tags.create-tag');
});

Route::post('/create-tag', [TagsController::class, 'createTag']);