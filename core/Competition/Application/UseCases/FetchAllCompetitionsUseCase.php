<?php
namespace Core\Competition\Application\UseCases;

use Core\Competition\Domain\CompetitionServiceInterface;

class FetchAllCompetitionsUseCase{

    private CompetitionServiceInterface  $competitionService;

    public function __construct(CompetitionServiceInterface $competitionService)
    {
        $this->competitionService = $competitionService;
    }

    public function __invoke() : array
    {
        return $this->competitionService->getAllCompetitions();
    }

    
}