<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardActiveController;
use App\Http\Controllers\DashboardIndexController;
use App\Http\Controllers\DashboardCreateController;
use App\Http\Controllers\DashboardStoreController;
use App\Http\Controllers\DashboardShowController;
use App\Http\Controllers\DashboardEditController;
use App\Http\Controllers\DashboardUpdateController;
use App\Http\Controllers\DashboardDeleteController;
use App\Http\Controllers\TournamentSetUpController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


Route::group(['middleware' => 'auth'], function () {

	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::put('profile/images', ['as' => 'profile.images', 'uses' => 'App\Http\Controllers\ProfileController@images']);

	Route::post('tournaments/addTeam',[TournamentSetUpController::class, 'addTeam'] )->name('tournaments.addTeam');
	Route::get('tournaments/setGames/{id}',[TournamentSetUpController::class, 'setGames'] )->name('tournaments.setGames');
	Route::get('tournaments/tabla/{id}',[TournamentSetUpController::class, 'getTable'] )->name('tournaments.getTable');
	Route::get('tournaments/estadisticas/{id}',[TournamentSetUpController::class, 'getEstadisticas'] )->name('tournaments.getEstadisticas');
	Route::get('tournaments/oportunidades/{id}',[TournamentSetUpController::class, 'getOportunidades'] )->name('tournaments.getOportunidades');

 
// Index

	Route::get('events',[DashboardIndexController::class, 'events'])->name('events.index');		
	Route::get('actions',[DashboardIndexController::class, 'actions'])->name('actions.index');
	Route::get('fields',[DashboardIndexController::class, 'fields'])->name('fields.index');
	Route::get('games',[DashboardIndexController::class, 'games'])->name('games.index');
	Route::get('leagues',[DashboardIndexController::class, 'leagues'])->name('leagues.index');
	Route::get('locations',[DashboardIndexController::class, 'locations'])->name('locations.index');
	Route::get('materials',[DashboardIndexController::class, 'materials'])->name('materials.index');
	Route::get('modalities',[DashboardIndexController::class, 'modalities'])->name('modalities.index');
	Route::get('permissions',[DashboardIndexController::class, 'permissions'])->name('permissions.index');
	Route::get('players',[DashboardIndexController::class, 'players'])->name('players.index');
	Route::get('profiles',[DashboardIndexController::class, 'profiles'])->name('profiles.index');
	Route::get('referees',[DashboardIndexController::class, 'referees'])->name('referees.index');
	Route::get('refereeTypes',[DashboardIndexController::class, 'refereeTypes'])->name('refereeTypes.index');
	Route::get('roles',[DashboardIndexController::class, 'roles'])->name('roles.index');
	Route::get('scores',[DashboardIndexController::class, 'scores'])->name('scores.index');
	Route::get('sports',[DashboardIndexController::class, 'sports'])->name('sports.index');
	Route::get('teams',[DashboardIndexController::class, 'teams'])->name('teams.index');
	Route::get('tournaments',[DashboardIndexController::class, 'tournaments'])->name('tournaments.index');
	Route::get('users',[DashboardIndexController::class, 'users'])->name('users.index');
	Route::get('referees/games',[DashboardIndexController::class, 'getRefereeGames'] )->name('referees.getRefereeGames');
	// Create
	Route::get('actions/create',[DashboardCreateController::class, 'actions'])->name('actions.create');
	Route::get('events/create',[DashboardCreateController::class, 'events'])->name('events.create');
	Route::get('fields/create',[DashboardCreateController::class, 'fields'])->name('fields.create');
	Route::get('games/create',[DashboardCreateController::class, 'games'])->name('games.create');
	Route::get('leagues/create',[DashboardCreateController::class, 'leagues'])->name('leagues.create');
	Route::get('locations/create',[DashboardCreateController::class, 'locations'])->name('locations.create');
	Route::get('materials/create',[DashboardCreateController::class, 'materials'])->name('materials.create');
	Route::get('modalities/create',[DashboardCreateController::class, 'modalities'])->name('modalities.create');
	Route::get('permissions/create',[DashboardCreateController::class, 'permissions'])->name('permissions.create');
	Route::get('players/create',[DashboardCreateController::class, 'players'])->name('players.create');
	Route::get('profiles/create',[DashboardCreateController::class, 'profiles'])->name('profiles.create');
	Route::get('referees/create',[DashboardCreateController::class, 'referees'])->name('referees.create');
	Route::get('refereeTypes/create',[DashboardCreateController::class, 'refereeTypes'])->name('refereeTypes.create');
	Route::get('roles/create',[DashboardCreateController::class, 'roles'])->name('roles.create');
	Route::get('scores/create',[DashboardCreateController::class, 'scores'])->name('scores.create');
	Route::get('sports/create',[DashboardCreateController::class, 'sports'])->name('sports.create');
	Route::get('teams/create',[DashboardCreateController::class, 'teams'])->name('teams.create');
	Route::get('tournaments/create',[DashboardCreateController::class, 'tournaments'])->name('tournaments.create');
	Route::get('users/create',[DashboardCreateController::class, 'users'])->name('users.create');

	// Recibir formulario create
	Route::post('actions',[DashboardStoreController::class, 'actions'])->name('actions.store');
	Route::post('events',[DashboardStoreController::class, 'events'])->name('events.store');
	Route::post('fields',[DashboardStoreController::class, 'fields'])->name('fields.store');
	Route::post('games',[DashboardStoreController::class, 'games'])->name('games.store');
	Route::post('leagues',[DashboardStoreController::class, 'leagues'])->name('leagues.store');
	Route::post('locations',[DashboardStoreController::class, 'locations'])->name('locations.store');
	Route::post('materials',[DashboardStoreController::class, 'materials'])->name('materials.store');
	Route::post('modalities',[DashboardStoreController::class, 'modalities'])->name('modalities.store');
	Route::post('permissions',[DashboardStoreController::class, 'permissions'])->name('permissions.store');
	Route::post('players',[DashboardStoreController::class, 'players'])->name('players.store');
	Route::post('profiles',[DashboardStoreController::class, 'profiles'])->name('profiles.store');
	Route::post('referees',[DashboardStoreController::class, 'referees'])->name('referees.store');
	Route::post('refereeTypes',[DashboardStoreController::class, 'refereeTypes'])->name('refereeTypes.store');
	Route::post('roles',[DashboardStoreController::class, 'roles'])->name('roles.store');
	Route::post('scores',[DashboardStoreController::class, 'scores'])->name('scores.store');
	Route::post('sports',[DashboardStoreController::class, 'sports'])->name('sports.store');
	Route::post('teams',[DashboardStoreController::class, 'teams'])->name('teams.store');
	Route::post('tournaments',[DashboardStoreController::class, 'tournaments'])->name('tournaments.store');
	Route::post('users',[DashboardStoreController::class, 'users'])->name('users.store');

	// Vista a detalle
	Route::get('actions/{id}',[DashboardShowController::class, 'actions'])->name('actions.show');
	Route::get('events/{id}',[DashboardShowController::class, 'events'])->name('events.show');
	Route::get('fields/{id}',[DashboardShowController::class, 'fields'])->name('fields.show');
	Route::get('games/{id}',[DashboardShowController::class, 'games'])->name('games.show');
	Route::get('leagues/{id}',[DashboardShowController::class, 'leagues'])->name('leagues.show');
	Route::get('locations/{id}',[DashboardShowController::class, 'locations'])->name('locations.show');
	Route::get('materials/{id}',[DashboardShowController::class, 'materials'])->name('materials.show');
	Route::get('modalities/{id}',[DashboardShowController::class, 'modalities'])->name('modalities.show');
	Route::get('permissions/{id}',[DashboardShowController::class, 'permissions'])->name('permissions.show');
	Route::get('players/{id}',[DashboardShowController::class, 'players'])->name('players.show');
	Route::get('profiles/{id}',[DashboardShowController::class, 'profiles'])->name('profiles.show');
	Route::get('referees/{id}',[DashboardShowController::class, 'referees'])->name('referees.show');
	Route::get('refereeTypes/{id}',[DashboardShowController::class, 'refereeTypes'])->name('refereeTypes.show');
	Route::get('roles/{id}',[DashboardShowController::class, 'roles'])->name('roles.show');
	Route::get('scores/{id}',[DashboardShowController::class, 'scores'])->name('scores.show');
	Route::get('sports/{id}',[DashboardShowController::class, 'sports'])->name('sports.show');
	Route::get('teams/{id}',[DashboardShowController::class, 'teams'])->name('teams.show');
	Route::get('tournaments/{id}',[DashboardShowController::class, 'tournaments'])->name('tournaments.show');
	Route::get('users/{id}',[DashboardShowController::class, 'users'])->name('users.show');
	

	// Formulario editar
	Route::get('actions/edit/{id}',[DashboardEditController::class, 'actions'])->name('actions.edit');
	Route::get('events/edit/{id}',[DashboardEditController::class, 'events'])->name('events.edit');
	Route::get('fields/edit/{id}',[DashboardEditController::class, 'fields'])->name('fields.edit');
	Route::get('games/edit/{id}',[DashboardEditController::class, 'games'])->name('games.edit');
	Route::get('leagues/edit/{id}',[DashboardEditController::class, 'leagues'])->name('leagues.edit');
	Route::get('locations/edit/{id}',[DashboardEditController::class, 'locations'])->name('locations.edit');
	Route::get('materials/edit/{id}',[DashboardEditController::class, 'materials'])->name('materials.edit');
	Route::get('modalities/edit/{id}',[DashboardEditController::class, 'modalities'])->name('modalities.edit');
	Route::get('permissions/edit/{id}',[DashboardEditController::class, 'permissions'])->name('permissions.edit');
	Route::get('players/edit/{id}',[DashboardEditController::class, 'players'])->name('players.edit');
	Route::get('profiles/edit/{id}',[DashboardEditController::class, 'profiles'])->name('profiles.edit');
	Route::get('referees/edit/{id}',[DashboardEditController::class, 'referees'])->name('referees.edit');
	Route::get('refereeTypes/edit/{id}',[DashboardEditController::class, 'refereeTypes'])->name('refereeTypes.edit');
	Route::get('roles/edit/{id}',[DashboardEditController::class, 'roles'])->name('roles.edit');
	Route::get('scores/edit/{id}',[DashboardEditController::class, 'scores'])->name('scores.edit');
	Route::get('sports/edit/{id}',[DashboardEditController::class, 'sports'])->name('sports.edit');
	Route::get('teams/edit/{id}',[DashboardEditController::class, 'teams'])->name('teams.edit');
	Route::get('tournaments/edit/{id}',[DashboardEditController::class, 'tournaments'])->name('tournaments.edit');
	Route::get('users/edit/{id}',[DashboardEditController::class, 'users'])->name('users.edit');

	// Recibir formulario editar
	Route::put('actions/update/{id}',[DashboardUpdateController::class, 'actions'])->name('actions.update'); //
	Route::put('events/update/{id}',[DashboardUpdateController::class, 'events'])->name('events.update');
	Route::put('fields/update/{id}',[DashboardUpdateController::class, 'fields'])->name('fields.update'); 
	Route::put('games/update/{id}',[DashboardUpdateController::class, 'games'])->name('games.update');
	Route::put('leagues/update/{id}',[DashboardUpdateController::class, 'leagues'])->name('leagues.update');
	Route::put('locations/update/{id}',[DashboardUpdateController::class, 'locations'])->name('locations.update');
	Route::put('materials/update/{id}',[DashboardUpdateController::class, 'materials'])->name('materials.update');
	Route::put('modalities/update/{id}',[DashboardUpdateController::class, 'modalities'])->name('modalities.update');
	Route::put('permissions/update/{id}',[DashboardUpdateController::class, 'permissions'])->name('permissions.update'); //
	Route::put('players/update/{id}',[DashboardUpdateController::class, 'players'])->name('players.update');
	Route::put('profiles/update/{id}',[DashboardUpdateController::class, 'profiles'])->name('profiles.update'); //
	Route::put('referees/update/{id}',[DashboardUpdateController::class, 'referees'])->name('referees.update');
	Route::put('refereeTypes/update/{id}',[DashboardUpdateController::class, 'refereeTypes'])->name('refereeTypes.update');
	Route::put('roles/update/{id}',[DashboardUpdateController::class, 'roles'])->name('roles.update'); //
	Route::put('scores/update/{id}',[DashboardUpdateController::class, 'scores'])->name('scores.update'); //
	Route::put('sports/update/{id}',[DashboardUpdateController::class, 'sports'])->name('sports.update'); 
	Route::put('teams/update/{id}',[DashboardUpdateController::class, 'teams'])->name('teams.update');
	Route::put('tournaments/update/{id}',[DashboardUpdateController::class, 'tournaments'])->name('tournaments.update');
	Route::put('users/update/{id}',[DashboardUpdateController::class, 'users'])->name('users.update'); //

	// Borrar
	Route::delete('actions/{id}',[DashboardDeleteController::class, 'actions'])->name('actions.delete');
	Route::delete('events/{id}',[DashboardDeleteController::class, 'events'])->name('events.delete');
	Route::delete('fields/{id}',[DashboardDeleteController::class, 'fields'])->name('fields.delete');
	Route::delete('games/{id}',[DashboardDeleteController::class, 'games'])->name('games.delete');
	Route::delete('leagues/{id}',[DashboardDeleteController::class, 'leagues'])->name('leagues.delete');
	Route::delete('locations/{id}',[DashboardDeleteController::class, 'locations'])->name('locations.delete');
	Route::delete('materials/{id}',[DashboardDeleteController::class, 'materials'])->name('materials.delete');
	Route::delete('modalities/{id}',[DashboardDeleteController::class, 'modalities'])->name('modalities.delete');
	Route::delete('permissions/{id}',[DashboardDeleteController::class, 'permissions'])->name('permissions.delete');
	Route::delete('players/{id}',[DashboardDeleteController::class, 'players'])->name('players.delete');
	Route::delete('profiles/{id}',[DashboardDeleteController::class, 'profiles'])->name('profiles.delete');
	Route::delete('referees/{id}',[DashboardDeleteController::class, 'referees'])->name('referees.delete');
	Route::delete('refereeTypes/{id}',[DashboardDeleteController::class, 'refereeTypes'])->name('refereeTypes.delete');
	Route::delete('roles/{id}',[DashboardDeleteController::class, 'roles'])->name('roles.delete');
	Route::delete('scores/{id}',[DashboardDeleteController::class, 'scores'])->name('scores.delete');
	Route::delete('sports/{id}',[DashboardDeleteController::class, 'sports'])->name('sports.delete');
	Route::delete('teams/{id}',[DashboardDeleteController::class, 'teams'])->name('teams.delete');
	Route::delete('tournaments/{id}',[DashboardDeleteController::class, 'tournaments'])->name('tournaments.delete');
	Route::delete('users/{id}',[DashboardDeleteController::class, 'users'])->name('users.delete');

	
	// Activar
	Route::post('actions/active/{id}',[DashboardActiveController::class, 'actions'])->name('actions.active');
	Route::post('events/active/{id}',[DashboardActiveController::class, 'events'])->name('events.active');
	Route::post('fields/active/{id}',[DashboardActiveController::class, 'fields'])->name('fields.active');
	Route::post('games/active/{id}',[DashboardActiveController::class, 'games'])->name('games.active');
	Route::post('leagues/active/{id}',[DashboardActiveController::class, 'leagues'])->name('leagues.active');
	Route::post('locations/active/{id}',[DashboardActiveController::class, 'locations'])->name('locations.active');
	Route::post('materials/active/{id}',[DashboardActiveController::class, 'materials'])->name('materials.active');
	Route::post('modalities/active/{id}',[DashboardActiveController::class, 'modalities'])->name('modalities.active');
	Route::post('permissions/active/{id}',[DashboardActiveController::class, 'permissions'])->name('permissions.active');
	Route::post('players/active/{id}',[DashboardActiveController::class, 'players'])->name('players.active');
	Route::post('profiles/active/{id}',[DashboardActiveController::class, 'profiles'])->name('profiles.active');
	Route::post('referees/active/{id}',[DashboardActiveController::class, 'referees'])->name('referees.active');
	Route::post('refereeTypes/active/{id}',[DashboardActiveController::class, 'refereeTypes'])->name('refereeTypes.active');
	Route::post('roles/active/{id}',[DashboardActiveController::class, 'roles'])->name('roles.active');
	Route::post('scores/active/{id}',[DashboardActiveController::class, 'scores'])->name('scores.active');
	Route::post('sports/active/{id}',[DashboardActiveController::class, 'sports'])->name('sports.active');
	Route::post('teams/active/{id}',[DashboardActiveController::class, 'teams'])->name('teams.active');
	Route::post('tournaments/active/{id}',[DashboardActiveController::class, 'tournaments'])->name('tournaments.active');
	Route::post('users/active/{id}',[DashboardActiveController::class, 'users'])->name('users.active');
});

    