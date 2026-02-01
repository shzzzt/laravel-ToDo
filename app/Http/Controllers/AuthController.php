<?php

namespace App\Http\Controllers; //Namespaces prevent class name conflicts

use Illuminate\Http\Request; //Request class handles HTTP requests and provides methods to access request data
use Illuminate\Support\Facades\Hash; //Hash facade provides secure Bcrypt hashing for passwords
use Illuminate\Support\Facades\Session; //Session facade manages user sessions

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register'); // view located at resources/views/auth/register.blade.php
    }

    //The $request instance has a built-in validate() method that offers a convenient way to 
    //apply a wide variety of validation rules to incoming data.
    //validate -> create user -> login user -> redirect
    public function register(Request $request)
    {

        $validatedData = $request->validate([ //checks input data against defined rules below, show errors if invalid
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user, store in DB
        $user = \App\Models\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Log the user in
        // A session is a short-term memory of user data that is stored on the server side.
        Session::put('user_id', $user->id); //Store user_id in session

        // Redirect to tasks
        return redirect('/tasks');
    }

    public function showLogin() // returns the login view
    {
        return view('auth.login'); // view located at resources/views/auth/login.blade.php
    }
    // validate -> check credentials -> login user -> redirect
    public function login(Request $request)
    {
        $credentials = $request->validate([ //validate the input data
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        //where: query builder method to add a basic where clause to the query where('column_name', 'value')
        //first() executes the query and returns the first matching record
        $user = \App\Models\User::where('email', $credentials['email'])->first(); //retrieve user object by email

        if ($user && Hash::check($credentials['password'], $user->password)) { //hash::check compares raw and hashed password, returns true or false
            // Password matches, log the user in
            Session::put('user_id', $user->id); //Store user_id in session
            return redirect('/tasks');
        } else {
            // Invalid credentials
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }
    }

    public function logout(Request $request)
    { // logout user -> redirect
        Session::forget('user_id'); //Remove user_id from session
        return redirect('/login');
    }
}
