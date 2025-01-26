<?php

namespace App\Http\Controllers\V1\Team;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\Team\TeamDetailResource;
use Illuminate\Http\Request;
use Core\Team\Infrastructure\Controllers\GetTeamByIdController as CoreController;

class GetTeamByIdController extends Controller
{
    private $controller;

    public function __construct(CoreController $controller)
    {   
        $this->controller = $controller;
    }

    public function execute(Request $request){
        $id = $request->team_id;

        $result = $this->controller->__invoke($id);
        $data = TeamDetailResource::make($result);
        return new ApiResponse($data);
    }
}
