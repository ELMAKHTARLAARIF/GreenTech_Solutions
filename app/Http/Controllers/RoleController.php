<?php
namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;
class RoleController extends Controller
{
        public function index_role()
        {
            $roles = Role::all();
            return view('Admin.Roles', compact('roles'));
        }
        public function roles_store(Request $request){
            $validate = $request->validate([
                'name'=>'required|string|max:255'
            ]);
               $create = Role::create($validate);
            if ($create) {
                return redirect()->route('index_role');
            }
        }
        public function delete_role($id)
        {
            $role = Role::findOrFail($id);
            $role->delete();
            return redirect()->route('index_role')->with('success', 'Role deleted successfully!');
        }
        public function update($id){
            $role = Role::findOrFail($id);
            $role->update();
        }
}