<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use App\Repositories\UsersRepository;

class AuthService
{
    public function __construct(
        private UsersRepository $usersRepository
    )
    {}

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

    public function registerAccount(array $data)
    {
        $user = $this->usersRepository->create($data);

        if (!$user) 
        {
            throw new BadRequestHttpException('Failed to create user account');
        }

        return $user;
    }
}
