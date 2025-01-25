<?php

namespace App\Http\Resources;

use App\Http\Enums\HttpStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResponse extends JsonResource
{
    
    public function __construct(
        private $data,
        private HttpStatus $code = HttpStatus::OK,
        private $message = "Success",
        private $status = true,
    )
    {}

    public function toResponse($request)
    {
        $response = parent::toResponse($request);
        $data = [
            "status" => $this->status,
            "message" => $this->message,
            "code" => $this->code,
            "data" => $this->data,
        ];
        return $response->setStatusCode($this->code->value)
                        ->setData($data);
    }
    // public function toArray(Request $request): array
    // {
    //     return [
    //         "status" => $this->status,
    //         "message" => $this->message,
    //         "code" => $this->code,
    //         "data" => $this->data,
    //     ];
    // }
    // public function statusCode
}
