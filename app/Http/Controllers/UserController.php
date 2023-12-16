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
        $incomingFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);
        if (auth() ->attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
        }
        return redirect('/');
    }

    public function logout() {
        auth() ->logout();
        return redirect('/');
    }


}
