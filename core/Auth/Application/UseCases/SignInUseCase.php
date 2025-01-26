<?php
namespace Core\Auth\Application\UseCases;

use Core\Auth\Domain\AuthServiceInterface;

class SignInUseCase{

    private AuthServiceInterface $service;

    public function __construct(AuthServiceInterface $service)
    {
        $this->service = $service;
    }

    public function __invoke(string $email,$password)
    {
        return $this->service->signin($email,$password);
    }

}