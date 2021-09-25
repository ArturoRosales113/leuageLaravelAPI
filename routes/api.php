<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Controladores
use App\Http\Controllers\EventController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ModalitieController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\RefereeTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;

Route::resources([
    'event' => EventController::class,
    'field' => FieldController::class,
    'game' => GameController::class,
    'league' => LeagueController::class,
    'location' => LocationController::class,
    'material' => MaterialController::class,
    'modality' => ModalitieController::class,
    'permission' => PermissionController::class,
    'player' => PlayerController::class,
    'referee' => RefereeController::class,
    'refereeType' => RefereeTypeController::class,
    'role' => RoleController::class,
    'sport' => SportController::class,
    'team' => TeamController::class,
    'user' => UserController::class
]);


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
