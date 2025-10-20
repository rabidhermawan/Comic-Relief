<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Register
    public function registerShow () {
        return view('account.register');
    }

    public function register (Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' =>  'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        
        $createdUser = User::create($validated);
        
        Auth::login($createdUser);

        return redirect()->route('comic.index');
    }

    // Login/out
    public function loginShow () {
        return view('account.login');
    }

    public function login (Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('comic.index');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Incorrect credentials were provided'
        ]);
        
    }

    public function logout (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.loginPage');
    }

}
