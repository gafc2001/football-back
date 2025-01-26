<?php
namespace Core\Team\Infrastructure\Controllers;

use Core\Team\Application\UseCases\FetchCompetitionByIdUseCase;
use Core\Team\Application\UseCases\FetchTeamByIdUseCase;

class GetTeamByIdController{

    private FetchTeamByIdUseCase $useCase;

    public function __construct(FetchTeamByIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(int $id)
    {
        return $this->useCase->__invoke($id);
    }
    
}