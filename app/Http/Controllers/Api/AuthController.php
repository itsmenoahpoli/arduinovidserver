<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignInRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    )
    {}

    public function signin(SignInRequest $request) : JsonResponse
    {
        $result = $this->authService->authenticate($request->validated());

        return response()->json($result, Response::HTTP_OK);
    }

    public function signout(Request $request) : JsonResponse
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json('User logged-out', Response::HTTP_OK);
    }

    public function signup(SignupRequest $request) : JsonResponse
    {
        $result = $this->authService->registerAccount($request->validated());

        return response()->json($result, Response::HTTP_OK);
    }

    public function me(Request $request) : JsonResponse
    {
        return response()->json($request->user(), Response::HTTP_OK);
    }
}
