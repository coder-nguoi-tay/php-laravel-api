<?php

namespace App\Http\Controllers\API;

use App\Enums\ApiStatus;
use App\Enums\StatusCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\FactoryPattern\AuthFactoryService;
use App\Services\Users\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = $this->userService->createUser($validated);

        return response()->json($user, ApiStatus::CREATED->value);
    }
    /**
     * Summary of login
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $auth = AuthFactoryService::AuthLoginFactory($data['provider']);

        $response = $auth->login($data);

        return response()->json($response);
    }
}
