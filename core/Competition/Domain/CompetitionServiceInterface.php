<?php
namespace Core\Competition\Domain;

interface CompetitionServiceInterface{

    function getAllCompetitions() : array;

    function getCompetitionById(int $id) : array;

}