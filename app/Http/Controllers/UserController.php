<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = [];

        foreach ($users as $user) {
            $userId = $user->id;
            $userRole = DB::table('users')
            ->select('users.id', 'users.name', 'roles.name as role')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('users.id', $userId)
            ->first();

            array_push($roles, $userRole);
        }
        return Inertia::render('Users/Index', [
            'users' => User::paginate(),
            'roles' => $roles
        ]);
    }
    public function create()
    {
        //
        $roles = DB::table('roles')->get();
        return Inertia::render('Users/Create', [
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        //
        $user = User::create([
            'name' => $request->input('nombre'),
            'email' => $request->input('correo'),
            'password' => Hash::make($request->input('clave')),
        ]);
        event(new Registered($user));

        $userRol = User::find($user->id);
        $userRol->assignRole($request->input('rol'));

        return to_route('users.index');
    }

    public function destroy(Request $request, $id)
    {
        //elimina la cuenta
        $user = User::findOrFail($id);
        $roles = DB::table('model_has_roles')->where('model_id', $id)->get();
        $eliminarRol = $user->removeRole($roles[0]->role_id);
        $user->delete();
        return to_route('users.index');
    }
}
