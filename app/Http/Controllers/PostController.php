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
            'body' => 'required'
        ]);

        //strip_tags method cleans up input data - removed HTML and PHP tags
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/');
    }

    //use the metaphor syntax for Post type class, assign to post variable
    public function showEditScreen(Post $post)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        return view('edit-post', ['post' => $post]);
    }

    //Post $post gives us the post were are trying to update
    //Request $request gives us the incoming request data from our form
    public function updatePost(Post $post, Request $request)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        //Post model already has an update method thats standard
        $post->update($incomingFields);
        return redirect('/');
    }

    public function deletePost(Post $post) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $post->delete();
        return redirect('/');
    }
}
