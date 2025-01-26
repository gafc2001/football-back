<?php
namespace Core\Auth\Infrastructure;

use Core\Auth\Domain\AuthServiceInterface;
use Core\Auth\Domain\Response\AuthResponse;
use Core\Auth\Domain\UserAuth;
use Core\Auth\Domain\UserRepositoryInterface;
use Exception;

class AuthService implements AuthServiceInterface{
    
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function signin(string $email, string $password) : array{
        $user = $this->userRepository->findUserByEmail($email);
        
        $userAuth = new UserAuth($user->email,$user->password,$user->name);
        if(!$userAuth->verifyPassword($password)){
            throw new Exception("Invalid credentials");
        }
        $token = $user->createToken($user->id);
        $result = new AuthResponse($token->accessToken,"Bearer",$user);
        return $result->response();
    }

    function register(UserAuth $userAuth) : bool{
        return $this->userRepository->save($userAuth);
    }

    
}