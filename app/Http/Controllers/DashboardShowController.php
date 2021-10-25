<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelos
use App\Models\Event;
use App\Models\Field;
use App\Models\Material;
use App\Models\Modalitie;
use App\Models\League;
use App\Models\Location;
use App\Models\Sport;
use App\Models\Team;
use App\Models\User;

use App\Http\Traits\ImageManagerTrait;


class DashboardShowController extends Controller
{

	public function events($id)
    {
        $event = Event::findOrFail($id);
        return view('dashboard.events.show', ['event' => $event]);
    }
	public function fields($id)
    {
        $field = Field::findOrFail($id);
        return view('dashboard.fields.show', ['field' => $field]);
    }
	public function games($id)
    {
        $game = Game::findOrFail($id);
        return view('dashboard.games.show',['game' => $game]);
    }
	public function leagues($id)
    {
        $league = League::findOrFail($id);
        return view('dashboard.leagues.show', ['league' => $league]);
    }
	public function locations($id)
    {
        
        return view('dashboard.locations.show');
    }
	public function materials($id)
    {
        return view('dashboard.materials.show');
    }
	public function modalities($id)
    {
        return view('dashboard.modalities.show');
    }
	public function permissions($id)
    {
        return view('dashboard.permissions.show');
    }
	public function players($id)
    {
        return view('dashboard.players.show');
    }
	public function profiles($id)
    {
        return view('dashboard.profiles.show');
    }
	public function referees($id)
    {
        return view('dashboard.referees.show');
    }
	public function refereeTypes($id)
    {
        return view('dashboard.refereeTypes.show');
    }
	public function roles($id)
    {
        return view('dashboard.roles.show');
    }
	public function scores($id)
    {
        return view('dashboard.scores.show');
    }
	public function sports($id)
    {
        return view('dashboard.sports.show');
    }
	public function teams($id)
    {
        return view('dashboard.teams.show');
    }
	public function users($id)
    {
        return view('dashboard.users.show');
    }
}
