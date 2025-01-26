<?php
namespace Core\Auth\Domain\Response;

use App\Models\User;
use Core\Auth\Domain\UserAuth;

class AuthResponse{

    private string $token;

    private string $tokenType;

    private User $user;

    public function __construct(string $token, string $tokenType, User $user)
    {
        $this->token = $token;
        $this->tokenType = $tokenType;
        $this->user = $user;
    }

    public function response() : array {
        return [
            "auth" => [
                "token" => $this->token,
                "type" => $this->tokenType,
            ],
            "user" => [
                "name" => $this->user->name,
                "email" => $this->user->email,
            ]
        ];
    }

}