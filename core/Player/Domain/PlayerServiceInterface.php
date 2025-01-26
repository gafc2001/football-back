<?php
namespace Core\Player\Domain;

interface PlayerServiceInterface{

    function getAllPlayers() : array;
}