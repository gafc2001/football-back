<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Enums\HttpStatus;
use App\Http\Resources\ApiResponse;
use Core\Auth\Domain\AuthServiceInterface;
use Core\Auth\Domain\UserAuth;
use Core\Auth\Infrastructure\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthServiceInterface $service;

    public function __construct(AuthServiceInterface $service)
    {
        $this->service = $service;
    }

    public function signin(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required|string",
        ]);

        $response = $this->service->signin($request->email,$request->password);
        return $response;
    }

    public function register(Request $request){
        $request->validate([
            "email" => "required|email|unique:users,email",
            "name" => "required|string",
            "password" => "required|string",
        ]);
        $userAuth = new UserAuth(
            $request->email,
            $request->password,
            $request->name,
        );
        $result = $this->service->register($userAuth);
        if($result){
            return new ApiResponse([
                "message" => "User created succesfully",
            ],HttpStatus::CREATED);
        }
        return new ApiResponse([
            "error" => "Error on register",
        ],HttpStatus::INTERNAL_SERVER_ERROR);
    }
}
