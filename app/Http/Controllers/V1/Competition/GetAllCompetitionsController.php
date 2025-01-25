<?php

namespace App\Http\Controllers\V1\Competition;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\CompetitionListResource;
use Core\Competition\Infrastructure\Controllers\GetAllCompetitionsController as CoreController;
use Illuminate\Http\Request;

class GetAllCompetitionsController extends Controller
{
    
    private $controller;

    public function __construct(CoreController $controller)
    {   
        $this->controller = $controller;
    }

    public function execute(){
        $result = $this->controller->__invoke();
        $data = CompetitionListResource::collection($result);
        return new ApiResponse($data);
    }
}
