<?php

namespace App\Http\Controllers\V1\Player;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\PlayerResource;
use Illuminate\Http\Request;
use Core\Player\Infrastructure\Controllers\GetAllPlayersController as CoreController;
class GetAllPlayersController extends Controller
{
    private $controller;

    public function __construct(CoreController $controller)
    {   
        $this->controller = $controller;
    }

    public function execute(Request $request){
        $id = $request->team_id;

        $result = $this->controller->__invoke($id);
        $data = PlayerResource::collection($result);
        return new ApiResponse($data);
    }
}
