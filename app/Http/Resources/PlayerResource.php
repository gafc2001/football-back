<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $jsonString = Storage::disk("public")->get($this->json_path);
        $json = json_decode($jsonString,true);
        return [
            "team_id" => $json["id"],
            "team_crest" => $json["crest"],
            "team" => $json["name"],
            "team_short_name" => $json["shortName"],
            "players" => $json["squad"],
        ];
    }
}
