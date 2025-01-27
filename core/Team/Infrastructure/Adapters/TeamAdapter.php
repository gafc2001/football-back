<?php
namespace Core\Team\Infrastructure\Adapters;

use App\Models\TeamResponse;
use Core\Team\Domain\TeamServiceInterface;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
        $teamResponse = TeamResponse::where("remote_id",$id)->first();
        if(!!$teamResponse){
            $json = Storage::disk("public")->get($teamResponse->json_path);
            return json_decode($json,true);
        }
        $response = Http::withHeaders([
            "X-Auth-Token" => $this->apiKey
        ])->withOptions([
            'verify' => false,
        ])->get("{$this->baseUrl}/v4/teams/{$id}");
        if($response->failed()){
            throw new Exception("Error on fetching data");
        }
        $json =  $response->json();
        $jsonData = json_encode($json, JSON_PRETTY_PRINT);

        $path = "response/team_{$id}.json";
        TeamResponse::create([
            "remote_id" => $id,
            "json_path" => $path,
        ]);
        Storage::disk("public")->put($path,$jsonData);
        return $json;
    }

}