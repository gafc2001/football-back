<?php
namespace Core\Player\Application\UseCases;

use Core\Player\Domain\PlayerServiceInterface;

class FetchAllPlayersUseCase{

    private PlayerServiceInterface  $playerService;

    public function __construct(PlayerServiceInterface $playerService)
    {
        $this->playerService = $playerService;
    }

    public function __invoke() : array
    {
        return $this->playerService->getAllPlayers();
    }

    
}