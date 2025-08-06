<?php

namespace App\Interfaces;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

interface AuthInterface
{
    public function register(RegisterRequest $request);
    public function login(LoginRequest $request);
    public function logout(Request $request);
}
