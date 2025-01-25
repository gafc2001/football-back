<?php
namespace Core\Competition\Infrastructure\Controllers;

use Core\Competition\Application\UseCases\FetchAllCompetitionsUseCase;

class GetAllCompetitionsController{

    private FetchAllCompetitionsUseCase $useCase;

    public function __construct(FetchAllCompetitionsUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke()
    {
        return $this->useCase->__invoke();
    }
    
}