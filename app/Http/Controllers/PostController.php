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
    
    public function showPost($id) {
        
        $post = Post::findOrFail($id);

        return view('posts.post', ['post' => $post]);
    }

    //use the metaphor syntax for Post type class, assign to post variable
    public function showEditScreen($id)
    {
        //check for logged in user
        if (!auth()->check()) {
            return redirect('/');
        }

        $post = Post::findOrFail($id);

        return view('admin.posts.edit-post', ['post' => $post]);
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

         // Strip HTML and PHP tags
        $incomingFields = array_map('strip_tags', $incomingFields);

        // Assuming you have a route parameter {id} for the post you want to update
        $postId = $request->route('id');

        // Retrieve the existing post
        $post = Post::findOrFail($postId);

        // Update the post fields
        $post->update($incomingFields);

        return redirect('/admin');
    }

    public function deletePost($id) {
        if (!auth()->check()) {
            return redirect('/');
        }

        $post = Post::findOrFail($id);

        $post->delete();
        return redirect('/admin');
    }

    //used to return all posts for feed
    public function index() {
        return Post::all();
    }
}
