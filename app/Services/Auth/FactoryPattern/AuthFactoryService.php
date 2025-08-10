<?php

namespace App\Services\Auth\FactoryPattern;

use App\Services\Auth\ProductPattern\Basesic\BasesicLogin;
use App\Services\Auth\ProductPattern\FaceBook\FaceBookLoginService;
use App\Services\Auth\ProductPattern\Github\GithubLoginService;
use App\Services\Auth\ProductPattern\Google\GoogleLoginService;
use InvalidArgumentException;

class AuthFactoryService
{
    static public function AuthLoginFactory($provider): BasesicLogin|FaceBookLoginService|GithubLoginService|GoogleLoginService
    {
        return match (strtolower($provider)) {
            'basesic' => new BasesicLogin(),
            'google' => new GoogleLoginService(),
            'facebook' => new FaceBookLoginService(),
            'github' => new GithubLoginService(),
            default => throw new InvalidArgumentException("Unsupported authentication provider: $provider"),
        };
    }
}