<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {   
        $user_id = Session::get('user_id'); //get user_id from session
        $user = User::find($user_id); //retrieve user object by id
        return view('profile.show', compact('user')); //makes $user available in the view
    }

    public function update(Request $request)
    {// update user profile -> redirect back with success message
        $user = User::find(Session::get('user_id')); //retrieve user object by id

        $request->validate([ //validate input data
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        // update user details
        $user->name = $request->name; //request->name gets the 'name' input from the request
        $user->email = $request->email;

        if ($request->filled('password')) { //if password field is filled, update password
            $user->password = Hash::make($request->password); //hash the new password
        }

        $user->save(); //save changes to DB
        //back() redirects the user back to the previous page
        return back()->with('success', 'Profile updated successfully'); //redirect back with success message
    }
}
