<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        Permission::create($request->all());

        return redirect()->route('admin.permissions.index');
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permission', "roles"));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name'=> 'required']);
        $permission->update($validated);

        return to_route('admin.permissions.index');
    }

    public function destroy(Permission $permission){
        $permission->delete();

        return back()->with('message', 'Permission deteled');
    }
    
    public function assignRole(Request $request, Permission $permission){
        if($permission->hasRole($request->role)){
            return back()->with('message', 'Role already assigned');
        }
     
        $permission->assignRole($request->role);
        return back()->with('message', 'Role assigned');
    }

    public function removeRole(Permission $permission, Role $role){
        // dd($permission->hasRole($request->role));
        // dd($role->hasPermissionTo($permission));
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            return back()->with('message', 'Role not assigned');
        }
        
        return back()->with('message', 'Role removed');
    }
}
