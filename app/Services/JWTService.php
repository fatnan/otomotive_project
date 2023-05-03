<?php

namespace App\Services;

use Firebase\JWT\JWT;

class JWTService
{
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function encode(array $payload): string
    {
        return JWT::encode($payload, $this->key);
    }

    public function decode(string $token): object
    {
        return JWT::decode($token, $this->key, ['HS256']);
    }
}
