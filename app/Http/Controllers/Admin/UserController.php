<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {        
        $users = User::all()->except(Auth::id());
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        //$roles = Role::all();

        /*

        if(Auth::id() != 1) {
            abort(403);
        }
        */

        $roles = DB::table('roles')
        ->selectRaw('*')
        ->where('edit_id', '<>', 1)
        ->get();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        if(Auth::id() != 1) {
            abort(403);
        } else {
            return to_route('admin.users.index')->with('message', 'User updated in database.'); 
        }

        
    }

    public function destroy(User $user)
    {
        $user->delete();
        return to_route('admin.users.index')->with('message', 'User deleted from database.');
    }
}
