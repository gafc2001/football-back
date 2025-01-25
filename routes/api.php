<?php

use App\Http\Controllers\V1\Competition\GetAllCompetitionsController;
use App\Http\Controllers\V1\Competition\GetCompetitionByIdController;
use Illuminate\Support\Facades\Route;


Route::prefix("v1")->group(function(){
    Route::get('competitions',[GetAllCompetitionsController::class,'execute']);
    Route::get('competitions/{competition_id}', [GetCompetitionByIdController::class,'execute']);
    Route::get('team', fn() => response()->json(["message" => "Hola"]));
    Route::get('team/{team_id}', fn() => response()->json(["message" => "Hola"]));
    Route::get('players', fn() => response()->json(["message" => "Hola"]));
});
