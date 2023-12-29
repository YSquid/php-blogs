<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //define a function that takes one parameter, $request, of type Request
    public function register(Request $request) {
        //request object has a validate field method we call using arrow syntax, similar to dot syntax in JS
        //rules are defined in an associative array
        //the validate method returns associate array of request fields if passed, or error if failed
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:28', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:4', 'max:28']
        ]);

        //note bcrypt comes standard with Laravel as a global utility
        $incomingFields['password'] = bcrypt($incomingFields['password']);

        //think of models like prototype or constructor for a piece of data
        //here we use the provided User model and create a user with incomingFields
        $user = User::create($incomingFields);

        //call global auth utility which handles login
        auth() ->login($user);

        //use laravel built it routing
        return redirect('/');
    }

    public function login(Request $request) {
        try {
            $incomingFields = $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed
            return redirect('/login')->withErrors($e->errors())->withInput();
        }
    
        if (auth()->attempt(['name' => $incomingFields['username'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
        } else {
            // Authentication failed
            return redirect('/login')->withErrors(['loginError' => 'Invalid username or password'])->withInput();
        }
    
        return redirect('/admin');
    }

    public function logout() {
        auth() ->logout();
        return redirect('/');
    }


}
