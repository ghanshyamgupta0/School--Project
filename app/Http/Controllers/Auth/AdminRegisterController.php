<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminRegisterController extends Controller
{
    public function showRegistrationForm(Request $request)
    {
        // Check for admin registration token
        if ($request->token != config('app.admin_register_token')) {
            return redirect('/')->with('error', 'Invalid admin registration link.');
        }
        
        return view('auth.admin-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'token' => ['required', 'numeric'],
        ]);

        // Verify admin registration token
        if ($request->token != config('app.admin_register_token')) {
            return back()->with('error', 'Invalid admin registration token.');
        }

        // Check if admin already exists
        if (User::where('is_admin', true)->exists()) {
            return back()->with('error', 'An admin user already exists.');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => true,
        ]);

        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }
} 