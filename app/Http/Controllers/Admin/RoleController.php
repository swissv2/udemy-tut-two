<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        //set the roles on fire
        //$roles = Role::all();

        $roles = Role::whereNotIn('name', ['admin'])->orderBy('id')->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3', 'max:10']]);
        Role::create($validated);

        return to_route('admin.roles.index')->with('message', 'New role added to database.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3', 'max:10']]);
        $role->update($validated);

        return to_route('admin.roles.index')->with('message', 'Role updated in database.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return to_route('admin.roles.index')->with('message', 'Role deleted from database.');
    }

    public function assignPermissions(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions);
        return back()->with('message', 'Permission(s) assigned to Role.');
    }
}
