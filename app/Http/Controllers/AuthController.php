<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Services\AuthService;

class AuthController extends Controller
{
    public function Login()
    {
        return view('Auth.login');
    }
    public function showRegister()
    {
        return view('Auth.register');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validatedData) {
            (new AuthService())->register($validatedData);
            return redirect()->route('products')
                ->with('success', 'Registration successful!');
        }
    }
    public function CheckloginData(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        (new AuthService())->CheckloginData($credentials);
        return redirect()->route('products')
            ->with('success', 'Registration successful!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('Login')->with('success', 'Logged out successfully!');
    }
}
