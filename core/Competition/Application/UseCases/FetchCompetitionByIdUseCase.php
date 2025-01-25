<?php
namespace Core\Competition\Application\UseCases;

use Core\Competition\Domain\CompetitionServiceInterface;

class FetchCompetitionByIdUseCase{

    private CompetitionServiceInterface  $competitionService;

    public function __construct(CompetitionServiceInterface $competitionService)
    {
        $this->competitionService = $competitionService;
    }

    public function __invoke(int $id) : array
    {
        return $this->competitionService->getCompetitionById($id);
    }

    
}