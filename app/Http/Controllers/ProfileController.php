<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('profile.index')->withUser($user);
    }

    public function edit()
    {
        $user = Auth::user();
        if (isset($user->profile))
            $profile = $user->profile;
        else {
            $profile = new Profile;
            $profile->phone = "";
            $profile->description = "";
            $profile->location = "";
        }

        return view('profile.edit')->with('user', $user)->with('profile', $profile);
    }

    public function update(Request $request)
    {
        $id = Auth::id();
        $this->validate($request, [
            'name' => "required|string|max:255|unique:users,name,$id",
            'email' => "required|string|email|max:255|unique:users,email,$id",
            'gender' => 'required|boolean',
            'phone' => 'nullable|max:20',
            'location' => 'nullable|string',
            'description' => 'nullable|string'
        ]);

        $avatar = "public/defaults/avatars/";
        $avatar .= ($request->input('gender') == "1" ? 'male.png' : 'female.png');

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->slug = str_slug($request->input('name'));
        $user->avatar = $avatar;
        $user->save();

        if (isset($user->profile))
            $profile = $user->profile;
        else
            $profile = new Profile;

        $profile->user_id = $user->id;
        $profile->phone = $request->input('phone');
        $profile->location = $request->input('location');
        $profile->description = $request->input('description');

        $profile->save();
        return redirect()->route('profile', $user->slug);

    }
}
