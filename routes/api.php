<?php

use App\Http\Controllers\V1\Competition\GetAllCompetitionsController;
use App\Http\Controllers\V1\Competition\GetCompetitionByIdController;
use App\Http\Controllers\V1\Team\GetAllTeamsController;
use App\Http\Controllers\V1\Team\GetTeamByIdController;
use Illuminate\Support\Facades\Route;


Route::prefix("v1")->group(function(){
    Route::get('competitions',[GetAllCompetitionsController::class,'execute']);
    Route::get('competitions/{competition_id}', [GetCompetitionByIdController::class,'execute']);
    Route::get('teams', [GetAllTeamsController::class,'execute']);
    Route::get('teams/{team_id}', [GetTeamByIdController::class,'execute']);
    Route::get('players', fn() => response()->json(["message" => "Hola"]));
});
