<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\InterestController;
use App\Http\Controllers\Api\MatchesController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserInterestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/User', [UserController::class, 'list']);
Route::get('/User/{id}', [UserController::class, 'item']);
Route::post('/User/create', [UserController::class, 'create']);
Route::post('/User/{id}/update', [UserController::class, 'update']);

Route::get('/Interest', [InterestController::class, 'list']);
Route::get('/Interest/{id}', [InterestController::class, 'item']);
Route::post('/Interest/create', [InterestController::class, 'create']);
Route::post('/Interest/{id}/update', [InterestController::class, 'update']);

Route::get('/UserInterest', [UserInterestController::class, 'list']);
Route::get('/UserInterest/{id}', [UserInterestController::class, 'item']);
Route::post('/UserInterest/create', [UserInterestController::class, 'create']);
Route::post('/UserInterest/{id}/update', [UserInterestController::class, 'update']);

Route::get('/Matches', [MatchesController::class, 'list']);
Route::get('/Matches/{id}', [MatchesController::class, 'item']);
Route::post('/Matches/create', [MatchesController::class, 'create']);
Route::post('/Matches/{id}/update', [MatchesController::class, 'update']);

Route::post('/Login', [AuthController::class, 'login']);
Route::post('/Register', [AuthController::class, 'register']);