<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function showregister(){
        return view('auth.register');
    }

    public function register(Request $request){

        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'sometimes|string|in:user,admin'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'] ?? 'user'
        ]);

        Auth::login($user);
        
        return redirect()->route('showdashboard')->with('success','Registration Complete!!!');
    }

    public function showdashboard(){
        $profile = User::with('profile')->find(Auth::id());
        $user = User::with('profile', 'posts')->find(Auth::id());
        return view('auth.dashboard', ['user' => $profile, 'posts' => $user->posts]);
    }

    public function showlogin(){
        return view('auth.login');

    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('showdashboard');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);

    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('showlogin')->with('sucess', 'Logout Successful');
        
    }
}
