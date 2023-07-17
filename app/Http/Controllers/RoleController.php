<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignRoleToUserRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Role::class, 'role');
    }


    public function index()
    {
        return $this->response(Role::all());
    }


    public function store(StoreRoleRequest $request)
    {
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);

        return $this->success('role created', $role);
    }


    public function show(Role $role)
    {
        //
    }


    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }


    public function destroy(Role $role)
    {
        //
    }


    public function assign(AssignRoleToUserRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        $role = Role::findOrFail($request->role_id);

        $user->assignRole($role->name);

        return $this->success('role assigned');
    }
}
