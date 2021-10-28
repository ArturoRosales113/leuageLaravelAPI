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
        $location = Location::findOrFail($id);
        return view('dashboard.locations.show',['location' => $location]);
    }
	public function materials($id)
    {
        $material = Material::findOrFail($id);
        return view('dashboard.materials.show', ['material' => $material]);
    }
	public function modalities($id)
    {
        $modalitie = Modalitie::findOrFail($id);
        return view('dashboard.modalities.show',['modalitie' => $modalitie]);
    }
	public function permissions($id)
    {
        $permisission = Permission::findOrFail($id);
        return view('dashboard.permissions.show',['permission' => $permission]);
    }
	public function players($id)
    {
        $player = Player::findOrFail($id);
        return view('dashboard.players.show', ['player' => $player]);
    }
	public function profiles($id)
    {
        $profile = Profile::findOrFail($id);
        return view('dashboard.profiles.show', ['profile' => $profile]);
    }
	public function referees($id)
    {
        $referee = Referee::findOrFail($id);
        return view('dashboard.referees.show', ['referee' => $referee]);
    }
	public function refereeTypes($id)
    {
        $refereeType = RefereeType::findOrFail($id);
        return view('dashboard.refereeTypes.show', ['refereeType' => $refereeType]);
    }
	public function roles($id)
    {
        $role = Role::findOrFail($id);
        return view('dashboard.roles.show', ['role' => $role]);
    }
	public function scores($id)
    {
        $score = Score::findOrFail($id);
        return view('dashboard.scores.show',['score' => $score]);
    }
	public function sports($id)
    {
        $sport = Sport::findOrFail($id);
        return view('dashboard.sports.show', ['sport' => $sport]);
    }
	public function teams($id)
    {
        $team = Team::findOrFail($id);
        return view('dashboard.teams.show', ['team' => $team]);
    }
	public function users($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.show', ['user' => $user]);
    }
}
