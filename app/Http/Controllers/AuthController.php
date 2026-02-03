<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Services\AuthService;

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

        return (new AuthService())->register($validatedData);
    }
    public function SheckloginData(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        return (new AuthService())->SheckloginData($credentials);

    }
}
