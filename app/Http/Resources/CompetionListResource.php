<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompetionListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "area" =>  $this->area,
            "name" => $this->name,
            "code" => $this->code,
            "type" => $this->type,
            "emblem" => $this->emblem,
            "plan" => $this->plan,
        ];
    }
}
