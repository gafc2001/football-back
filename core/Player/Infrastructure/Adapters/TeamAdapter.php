<?php
namespace Core\Player\Infrastructure\Adapters;

use Core\Player\Domain\PlayerServiceInterface;
use Exception;
use Illuminate\Support\Facades\Http;

class PlayerAdapter implements PlayerServiceInterface{

    private string $baseUrl;
    private string $apiKey;

    public function __construct(){
        $this->baseUrl = config("services.football_data.base_url");
        $this->apiKey = config("services.football_data.api_key");
    }

    function getAllPlayers() : array{
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
}