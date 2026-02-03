<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthService
{
public function register(array $data)
{
    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => 'client',
    ]);

    if ($user) {
        Auth::login($user);
        return redirect()->route('products')
            ->with('success', 'Registration successful!');
    }

    return back()->withErrors([
        'register_error' => 'Registration failed. Please try again.'
    ]);
}
public function SheckloginData(array $credentials)
{

    if (Auth::attempt($credentials)) {
        session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->intended('Dashboard')
                ->with('success', 'Welcome admin!');
        } else {
            return redirect()->intended('products')
                ->with('success', 'Login successful!');
        }
    }

    return back()->withErrors([
        'login_error' => 'The provided credentials do not match our records.'
    ]);
}

}
