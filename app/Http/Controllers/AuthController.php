<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('Auth.login');
    }
    public function showRegister()
    {
        return view('Auth.register');
    }
}

?>