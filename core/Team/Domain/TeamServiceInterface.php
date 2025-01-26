<?php
namespace Core\Team\Domain;

interface TeamServiceInterface{

    function getAllTeams() : array;

    function getTeamById(int $id) : array;

}