<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthService
{
    public function authenticate(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            return true;
        }

        throw new UnauthorizedHttpException('USER_NOT_AUTHENTICATED');
    }
}
