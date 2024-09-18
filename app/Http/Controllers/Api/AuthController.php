<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function signin(Request $request) : JsonResponse
    {
        $result = $this->authService->authenticate($request->all());
        return response()->json('ok', Response::HTTP_OK);
    }
}
