<?php
namespace Core\Competition\Infrastructure\Adapters;

use Core\Competition\Domain\CompetitionServiceInterface;
use Exception;
use Illuminate\Support\Facades\Http;

class CompetitionAdapter implements CompetitionServiceInterface{

    private string $baseUrl;
    private string $apiKey;

    public function __construct(){
        $this->baseUrl = config("services.football_data.base_url");
        $this->apiKey = config("services.football_data.api_key");
    }

    function getAllCompetitions() : array{
        $response = Http::withHeaders([
            "X-Auth-Token" => $this->apiKey
        ])->withOptions([
            'verify' => false,
        ])->get("{$this->baseUrl}/v4/competitions");
        if($response->failed()){
            throw new Exception("Error on fetching data");
        }
        return $response->json();
    }
    function getCompetitionById(int $id) : array{
        return [];
    }

}