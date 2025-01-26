<?php
namespace Core\Player\Infrastructure\Controllers;

use Core\Player\Application\UseCases\FetchAllPlayersUseCase;

class GetAllPlayersController{

    private FetchAllPlayersUseCase $useCase;

    public function __construct(FetchAllPlayersUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke()
    {
        return $this->useCase->__invoke();
    }
    
}