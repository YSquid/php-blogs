<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

//this was created with php artisan make:controller PostController
class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'hero_image' => 'required',
            'body_1' => 'required',
            'image_2' => 'required',
            'body_2' => 'required'
        ]);

        //strip_tags method cleans up input data - removed HTML and PHP tags
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['author'] = strip_tags($incomingFields['author']);
        $incomingFields['hero_image'] = strip_tags($incomingFields['hero_image']);
        $incomingFields['body_1'] = strip_tags($incomingFields['body_1']);
        $incomingFields['image_2'] = strip_tags($incomingFields['image_2']);
        $incomingFields['body_2'] = strip_tags($incomingFields['body_2']);
        Post::create($incomingFields);
        return redirect('/admin');
    }

    //use the metaphor syntax for Post type class, assign to post variable
    public function showEditScreen(Post $post)
    {
        //check for logged in user
        if (!auth()->check()) {
            return redirect('/');
        }

        return view('edit-post', ['post' => $post]);
    }

    //Post $post gives us the post were are trying to update
    //Request $request gives us the incoming request data from our form
    public function updatePost(Post $post, Request $request)
    {
        if (!auth()->check()) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'hero_image' => 'required',
            'body_1' => 'required',
            'image_2' => 'required',
            'body_2' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['author'] = strip_tags($incomingFields['author']);
        $incomingFields['hero_image'] = strip_tags($incomingFields['hero_image']);
        $incomingFields['body_1'] = strip_tags($incomingFields['body_1']);
        $incomingFields['image_2'] = strip_tags($incomingFields['image_2']);
        $incomingFields['body_2'] = strip_tags($incomingFields['body_2']);

        //Post model already has an update method thats standard
        $post->update($incomingFields);
        return redirect('/');
    }

    public function deletePost(Post $post) {
        if (!auth()->check()) {
            return redirect('/');
        }

        $post->delete();
        return redirect('/');
    }
}
