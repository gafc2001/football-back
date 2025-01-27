<?php
namespace Core\Player\Domain;

use Illuminate\Database\Eloquent\Collection;

interface PlayerServiceInterface{

    function getAllPlayers() : Collection;
}