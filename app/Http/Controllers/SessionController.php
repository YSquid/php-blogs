<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function updateSession(Request $request)
{
    $inputName = key($request->all()); // Gets the value of the first key in the request data
    $inputValue = $request->input($inputName); //gets the value associated with the input with inputName

    $post_data = $request->session()->get('post_data', []); // Get existing session data or an empty array
    $post_data[$inputName] = $inputValue; // Add or update the specific field
    $request->session()->put('post_data', $post_data); //updates the post_data in the session object with updated post_data

    return response()->json(['success' => true]); //lets client know response is success
}
}
