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
use App\Models\Tournament;
use App\Models\User;

class DashboardEditController extends Controller
{
    public function events($id)
    {
        $event = Event::findOrFail($id);
        return view('dashboard.events.edit', ['event' => $event]);
    }
	public function fields($id)
    {
        $field = Field::findOrFail($id);
        return view('dashboard.fields.edit', ['field' => $field]);
    }
	public function games($id)
    {
        $game = Game::findOrFail($id);
        return view('dashboard.games.edit',['game' => $game]);
    }
	public function leagues($id)
    {
        $league = League::findOrFail($id);
        return view('dashboard.leagues.edit', ['league' => $league]);
    }
	public function locations($id)
    {
        $location = Location::findOrFail($id);
        return view('dashboard.locations.edit',['location' => $location]);
    }
	public function materials($id)
    {
        $material = Material::findOrFail($id);
        return view('dashboard.materials.edit', ['material' => $material]);
    }
	public function modalities($id)
    {
        $modalitie = Modalitie::findOrFail($id);
        return view('dashboard.modalities.edit',['modalitie' => $modalitie]);
    }
	public function permissions($id)
    {
        $permisission = Permission::findOrFail($id);
        return view('dashboard.permissions.edit',['permission' => $permission]);
    }
	public function players($id)
    {
        $player = Player::findOrFail($id);
        return view('dashboard.players.edit', ['player' => $player]);
    }
	public function profiles($id)
    {
        $profile = Profile::findOrFail($id);
        return view('dashboard.profiles.edit', ['profile' => $profile]);
    }
	public function referees($id)
    {
        $referee = Referee::findOrFail($id);
        return view('dashboard.referees.edit', ['referee' => $referee]);
    }
	public function refereeTypes($id)
    {
        $refereeType = RefereeType::findOrFail($id);
        return view('dashboard.refereeTypes.edit', ['refereeType' => $refereeType]);
    }
	public function roles($id)
    {
        $role = Role::findOrFail($id);
        return view('dashboard.roles.edit', ['role' => $role]);
    }
	public function scores($id)
    {
        $score = Score::findOrFail($id);
        return view('dashboard.scores.edit',['score' => $score]);
    }
	public function sports($id)
    {
        $sport = Sport::findOrFail($id);
        return view('dashboard.sports.edit', ['sport' => $sport]);
    }
	public function teams($id)
    {
        $team = Team::findOrFail($id);
        return view('dashboard.teams.edit', ['team' => $team]);
    }
	public function tournaments($id)
    {
        $tournament = Tournament::findOrFail($id);
        return view('dashboard.tournaments.edit', ['tournament' => $tournament]);
    }
	public function users($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', ['user' => $user]);
    }
}
