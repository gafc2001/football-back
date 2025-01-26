<?php
namespace Core\Team\Infrastructure\Adapters;

use Core\Team\Domain\TeamServiceInterface;
use Exception;
use Illuminate\Support\Facades\Http;

use function PHPSTORM_META\map;

class TeamAdapter implements TeamServiceInterface{

    private string $baseUrl;
    private string $apiKey;

    public function __construct(){
        $this->baseUrl = config("services.football_data.base_url");
        $this->apiKey = config("services.football_data.api_key");
    }

    function getAllTeams() : array{
        $response = Http::withHeaders([
            "X-Auth-Token" => $this->apiKey
        ])->withOptions([
            'verify' => false,
        ])->get("{$this->baseUrl}/v4/teams",[
            "limit" => 100,
            "offset" => 100,
        ]);
        if($response->failed()){
            throw new Exception("Error on fetching data");
        }
        return $response->json()["teams"];
    }
    function getTeamById(int $id) : array{
        $response = Http::withHeaders([
            "X-Auth-Token" => $this->apiKey
        ])->withOptions([
            'verify' => false,
        ])->get("{$this->baseUrl}/v4/teams/{$id}");
        if($response->failed()){
            throw new Exception("Error on fetching data");
        }
        return $response->json();
    }

}