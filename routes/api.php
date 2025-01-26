<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\Competition\GetAllCompetitionsController;
use App\Http\Controllers\V1\Competition\GetCompetitionByIdController;
use App\Http\Controllers\V1\Player\GetAllPlayersController;
use App\Http\Controllers\V1\Team\GetAllTeamsController;
use App\Http\Controllers\V1\Team\GetTeamByIdController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::prefix("v1")->group(function(){
    Route::group(['middleware'=>'auth:api'], function(){
        Route::get('competitions',[GetAllCompetitionsController::class,'execute']);
        Route::get('competitions/{competition_id}', [GetCompetitionByIdController::class,'execute']);
        Route::get('teams', [GetAllTeamsController::class,'execute']);
        Route::get('teams/{team_id}', [GetTeamByIdController::class,'execute']);
        Route::get('players',[GetAllPlayersController::class,'execute']);
    });


    Route::post("auth/signin",[AuthController::class,'signin']);
    Route::post("auth/register",[AuthController::class,'register']);
});