<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function login()
    {
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('user.register');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');
    }

    public function settings()
    {
        $user = Auth()->user();
        return view('user.settings', ["id" => $user->id, "name" => $user->name, "email" => $user->email]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
        ]);

        $credentials['password'] = Hash::make($credentials['password'],[]);

        User::create($credentials);
        return redirect('/login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'new_password' => ['required','confirmed'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'password' => 'Wrong password',
            ])->onlyInput('password');
        }

        $user = User::findOrFail($id);

        $user->name = $credentials['name'];
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['new_password'],[]);
        $user->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = Auth()->User();
        if($user->id == $id)
        {
            $modelUser = User::find($id);
            $modelUser->delete();
        }
        return redirect()->back();
    }
}
