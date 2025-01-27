<?php
namespace Core\Player\Infrastructure\Adapters;

use App\Models\TeamResponse;
use Core\Player\Domain\PlayerServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class PlayerAdapter implements PlayerServiceInterface{
   
    function getAllPlayers() : Collection{
        $teams = TeamResponse::all();
        return $teams;
    }
}