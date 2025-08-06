<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Interfaces\AuthInterface;
use App\Traits\ApiResponse;

class AuthController extends Controller
{
    use ApiResponse;

    protected AuthInterface $authService;

    public function __construct(AuthInterface $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $result = $this->authService->register($request);
        return $this->success($result, 'User registered successfully');
    }

    public function login(LoginRequest $request)
    {
        $result = $this->authService->login($request);
        if (!$result) {
            return $this->error('Invalid credentials', 401);
        }

        return $this->success($result, 'User logged in successfully');
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);
        return $this->success([], 'User logged out successfully');
    }
}
