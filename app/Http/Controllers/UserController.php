<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Role;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role.permissions')->get();
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('Admin.Users', compact('roles', 'users', 'permissions'));
    }
    public function show()
    {
        $roles = Role::all();
        return view('Admin.user_form', compact('roles'));
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => $validatedData['role_id'],
        ]);

        if ($user) {
            return redirect()->route('index')
                ->with('success', 'User created successfully');
        }

        return back()->with('error', 'Failed to create user.');
    }

    public function User_delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('index')
            ->with('success', 'User deleted successfully');
    }

    public function export()
    {
        $filename = 'users.xlsx';
        return Excel::download(new UsersExport, $filename);
    }
}
