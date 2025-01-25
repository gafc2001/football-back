<?php
namespace Core\Competition\Infrastructure\Controllers;

use Core\Competition\Application\UseCases\FetchCompetitionByIdUseCase;

class GetCompetitionByIdController{

    private FetchCompetitionByIdUseCase $useCase;

    public function __construct(FetchCompetitionByIdUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(int $id)
    {
        return $this->useCase->__invoke($id);
    }
    
}