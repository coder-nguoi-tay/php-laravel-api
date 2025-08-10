<?php

namespace App\Services\Auth\ProductPattern\Basesic;

use App\Enums\ApiStatus;
use App\Enums\StatusCode;
use App\Repositories\UserRepository\UserInterface;
use App\Services\Auth\ProductPattern\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class BasesicLogin implements AuthInterface
{
    public function login($data)
    {
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        if (!Auth::attempt($credentials)) {
            return [
                'status' => StatusCode::NOT_FOUND->value,
                'messages' => 'The provided credentials are incorrect.',
            ];
        }

        $user = Auth::user();

        return [
            'status' => StatusCode::SUCCESS->value,
            'user' => $user,
            'token' => $user->createToken('auth_token')->accessToken
        ];
    }
}