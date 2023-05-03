<?php

namespace App\Http\Controllers;

use App\Services\JWTService;

class AuthController extends Controller
{
    private $jwt;

    public function __construct(JWTService $jwt)
    {
        $this->jwt = $jwt;
    }

    public function login()
    {
        // Authenticate user
        // $user = ...;

        // Create payload
        $payload = [
            'sub' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];

        // Encode payload into a token
        $token = $this->jwt->encode($payload);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 3600 // Token expiration time in seconds
        ]);
    }
}
