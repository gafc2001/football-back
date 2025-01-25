<?php

namespace App\Http\Controllers\V1\Competition;

use App\Http\Controllers\Controller;
use Core\Competition\Infrastructure\Controllers\GetAllCompetitionsController as CoreController;
use Illuminate\Http\Request;

class GetAllCompetitionsController extends Controller
{
    
    private $controller;

    public function __construct(CoreController $controller)
    {   
        $this->controller = $controller;
    }

    public function execute(Request $request){
        return $this->controller->__invoke();
    }
}
