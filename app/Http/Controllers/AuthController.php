<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;
use Exception;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): mixed
    {
        try {
            $credentials = $request->only('name', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->route('index', ['type' => 'customer']);
            }
            return back()->withErrors(['login_error' => 'Invalid credentials']);
        } catch (Exception $e) {
            Log::error('Login attempt failed: ' . $e->getMessage());
            return back()->withErrors(['login_error' => 'An error occurred during login. Please try again.']);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return redirect('/login');
        } catch (Exception $e) {
            Log::error('Logout attempt failed: ' . $e->getMessage());
            return redirect('/login')->withErrors(['logout_error' => 'An error occurred during logout. Please try again.']);
        }
    }
}
