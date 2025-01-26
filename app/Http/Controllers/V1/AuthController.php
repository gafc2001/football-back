<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Core\Auth\Domain\AuthServiceInterface;
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
}
