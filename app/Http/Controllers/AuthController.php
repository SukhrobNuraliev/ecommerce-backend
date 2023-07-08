<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $this->success(
            '',
            ['token' => $user->createToken($request->email)->plainTextToken]
        );
    }


    public function logout()
    {

    }


    public function register()
    {

    }

    public function changePassword()
    {

    }


    public function user(Request $request)
    {
        return $request->user()->getAllPermissions();
        return Role::where('name', 'shop-manager')->first()->permissions->pluck('name');
        return $request->user()->hasPermissionTo('order:delete');
        return $this->response(new UserResource($request->user()->getPermissionNames()));
    }
}
