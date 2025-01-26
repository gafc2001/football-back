<?php
namespace Core\Team\Application\UseCases;

use Core\Team\Domain\TeamServiceInterface;

class FetchAllTeamsUseCase{

    private TeamServiceInterface  $teamService;

    public function __construct(TeamServiceInterface $teamService)
    {
        $this->teamService = $teamService;
    }

    public function __invoke() : array
    {
        return $this->teamService->getAllTeams();
    }

    
}