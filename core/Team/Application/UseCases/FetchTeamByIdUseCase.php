<?php
namespace Core\Team\Application\UseCases;

use Core\Team\Domain\TeamServiceInterface;

class FetchTeamByIdUseCase{

    private TeamServiceInterface  $teamService;

    public function __construct(TeamServiceInterface $teamService)
    {
        $this->teamService = $teamService;
    }

    public function __invoke(int $id) : array
    {
        return $this->teamService->getTeamById($id);
    }

    
}