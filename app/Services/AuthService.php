<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthService
{
    public function authenticate(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            /**
             * @var App\Models\User $user
             */
            $user = Auth::user();
            $token = $user->createToken(
                now()->timestamp,
                ['*'],
                now()->addHours(2)
            )->plainTextToken;


            return [
                'token' => $token,
                'user'  => $user,
            ];
        }

        throw new UnauthorizedHttpException('USER_NOT_AUTHENTICATED');
    }
}
