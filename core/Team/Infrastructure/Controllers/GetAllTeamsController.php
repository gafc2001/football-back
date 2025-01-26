<?php
namespace Core\Team\Infrastructure\Controllers;

use Core\Team\Application\UseCases\FetchAllTeamsUseCase;

class GetAllTeamsController{

    private FetchAllTeamsUseCase $useCase;

    public function __construct(FetchAllTeamsUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke()
    {
        return $this->useCase->__invoke();
    }
    
}