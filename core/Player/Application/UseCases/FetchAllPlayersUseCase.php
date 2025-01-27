<?php
namespace Core\Player\Application\UseCases;

use Core\Player\Domain\PlayerServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class FetchAllPlayersUseCase{

    private PlayerServiceInterface  $playerService;

    public function __construct(PlayerServiceInterface $playerService)
    {
        $this->playerService = $playerService;
    }

    public function __invoke() : Collection
    {
        return $this->playerService->getAllPlayers();
    }

    
}