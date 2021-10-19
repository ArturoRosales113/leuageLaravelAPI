<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Event;
use App\Models\Field;
use App\Models\Games;
use App\Models\League;
use App\Models\Location;
use App\Models\Material;
use App\Models\Modalitie;
use App\Models\Permission;
use App\Models\Player;
use App\Models\Profile;
use App\Models\Referee;
use App\Models\RefereeType;
use App\Models\Role;
use App\Models\Score;
use App\Models\Sport;
use App\Models\Team;
use App\Models\User;


class DashboardIndexController extends Controller
{
    public function actions()
    {
        return view('dashboard.actions.index');
    }
	public function events()
    {
        return view('dashboard.events.index', ['events' => Event::all()]);
    }
	public function fields()
    {
        return view('dashboard.fields.index', ['fields' => Field::all()]);
    }
	public function games()
    {
        return view('dashboard.games.index', ['games' => Game::all()]);
    }
	public function leagues()
    {
        return view('dashboard.leagues.index', ['leagues' => League::all()]);
    }
	public function locations()
    {
        return view('dashboard.locations.index', ['locations' => Location::all()]);
    }
	public function materials()
    {
        return view('dashboard.materials.index', ['materials' => Material::all()]);
    }
	public function modalities()
    {
        return view('dashboard.modalities.index', ['modalitie' => Modalitie::all()]);
    }
	public function permissions()
    {
        return view('dashboard.permissions.index', ['permissions' => Permission::all()]);
    }
	public function players()
    {
        return view('dashboard.players.index', ['players' => Player::all()]);
    }
	public function profiles()
    {
        return view('dashboard.profiles.index', ['profiles' => Profile::all()]);
    }
	public function referees()
    {
        return view('dashboard.referees.index', ['referees' => Referee::all()]);
    }
	public function refereeTypes()
    {
        return view('dashboard.refereeTypes.index', ['refereeTypes' => RefereeType::all()]);
    }
	public function roles()
    {
        return view('dashboard.roles.index', ['roles' => Role::all()]);
    }
	public function scores()
    {
        return view('dashboard.scores.index', ['scores' => Score::all()]);
    }
	public function sports()
    {
        return view('dashboard.sports.index', ['sports' => Sport::all()]);
    }
	public function teams()
    {
        return view('dashboard.teams.index', ['teams' => Team::all()]);
    }
	public function users()
    {
        return view('dashboard.users.index', ['users' => User::all()]);
    }
}
