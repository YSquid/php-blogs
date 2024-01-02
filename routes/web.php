<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

//ADMIN PANEL ROUTES

Route::get('/admin', function() {
    if (auth()->check()) {
    return view('admin.admin-home');
    } 

    return view('admin.login');
});


//BASE ROUTE

Route::get('/', function() {
    return view('home');
});

//Blog Post Routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}',[PostController::class, 'deletePost']);
