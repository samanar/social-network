<?php

namespace App\Http\Controllers;

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
        else
            $profile = null;

        return view('profile.edit')->with('user', $user)->with('profile', $profile);
    }
}
