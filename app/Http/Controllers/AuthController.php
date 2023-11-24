<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\AuthService;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService,
        protected FileService $fileService,
    ){}

    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        $this->authService->checkCredentials($user, $request);

        return $this->success(
            '',
            ['token' => $user->createToken($request->email)->plainTextToken]
        );
    }


    public function logout()
    {
        auth()->user()->tokens()->delete();

        return $this->success('user logged out',);
    }


    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->assignRole('customer');

        $this->fileService->checkUserPhoto($request, $user);

        return $this->success(
            'user created',
            ['token' => $user->createToken($request->email)->plainTextToken]
        );
    }

    public function changePassword()
    {

    }


    public function user(Request $request)
    {
        return $this->response(new UserResource($request->user()));
    }

}
