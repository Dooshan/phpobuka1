<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ViewErrorBag;

class ProfilesController extends Controller
{


    public function index()
    {
        $profiles = User::all();
        return view('profiles.index', compact('profiles'));
    }


    public function avatar(Request $request)
    {

        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->name . '_avatar' . '.' . request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars', $avatarName);
        $user->avatar = $avatarName;
        $user->save();


        return back();
    }



    public function show(User $user)   //  route model binding

    {
        return view('profiles.show', [

            'profileUser' => $user,
            'threads' => $user->threads()->paginate(3)
        ]);
    }
}
