<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {   
        $user_id = Session::get('user_id'); //get user_id from session
        $user = User::find($user_id); //retrieve user object by id
        return view('profile.show', compact('user')); //makes $user available in the view
    }

    public function update(Request $request)
{
    $user = User::find(Session::get('user_id'));

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif', // Changed to nullable
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // Handle profile picture upload
    if ($request->hasFile('profile_image')) {
        // Delete old profile picture if exists
        if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
            Storage::disk('public')->delete($user->profile_image);
        }
        
        // Store new profile picture
        $path = $request->file('profile_image')->store('profile_image', 'public');
        $user->profile_image = $path;
        $user->save();
    }

    $user->save();
    return back()->with('success', 'Profile updated successfully');
}

    // public function upload(Request $request) {
    //     $user = User::find(Session::get('user_id'));//retrieve user object by id

    //     $request->validate([ //validate input data
    //         'pfp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     if ($request->hasFile('pfp')) {
    //         $image = $request->file('pfp');
    //         $name = time().'_'.$image->getClientOriginalName();
    //         $path = $request->file(key: "pfp")->store(path:'pfp', options: 'public');
    //         $user->pfp= $path;
    //         $user->save();

    //     if ($user->pfp) {
    //         Storage::disk('public')->delete($user->profile_image);
    //     }
    // }
    //     return back()->with('success', 'Profile image uploaded successfully!');
    // }
}

