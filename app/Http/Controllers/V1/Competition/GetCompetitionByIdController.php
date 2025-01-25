<?php

namespace App\Http\Controllers\V1\Competition;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\Competition\CompetitionDetailResource;
use App\Http\Resources\CompetitionListResource;
use Core\Competition\Infrastructure\Controllers\GetCompetitionByIdController as CoreController;
use Illuminate\Http\Request;

class GetCompetitionByIdController extends Controller
{
    
    private $controller;

    public function __construct(CoreController $controller)
    {   
        $this->controller = $controller;
    }

    public function execute(Request $request){
        $id = $request->competition_id;

        $result = $this->controller->__invoke($id);
        $data = CompetitionDetailResource::make($result);
        return new ApiResponse($data);
    }
}
