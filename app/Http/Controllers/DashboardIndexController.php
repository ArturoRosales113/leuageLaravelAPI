<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Event;
use App\Models\Field;
use App\Models\Game;
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


class DashboardIndexController extends Controller
{
    public function actions()
    {
        return view('dashboard.actions.index');
    }

	public function events()
    {
        return view('dashboard.events.index',
            ['events' => Event::all()]
        );
    }

	public function fields()
    {
        return view('dashboard.fields.index',
            ['fields' => Field::all()]
        );
    }

	public function games()
    {
        return view('dashboard.games.index',
            ['games' => Game::all()]
        );
    }

	public function leagues()
    {
        return view('dashboard.leagues.index',
            ['leagues' => League::paginate(10)]
        );
    }

	public function locations()
    {
        $user = auth()->user();
        if($user->hasAnyRole(['super-admin','back_office'])){
            $locations = Location::paginate(10);
        }
        if($user->hasAnyRole(['league_administrator'])){
            $locations = $user->league->locations()->paginate(10);
        }

        return view('dashboard.locations.index',
            ['locations' => $locations]
        );
    }

	public function materials()
    {
        return view('dashboard.materials.index',
            ['materials' => Material::all()]
        );
    }

	public function modalities()
    {
        return view('dashboard.modalities.index',
            ['modalities' => Modalitie::all()]
        );
    }

	public function permissions()
    {
        return view('dashboard.permissions.index',
            ['permissions' => Permission::all()]
        );
    }

	public function players()
    {
        $user = auth()->user();
        if($user->hasAnyRole(['super-admin','back_office'])){
            $players = Player::paginate(10);
        }
        if($user->hasAnyRole(['league_administrator'])){
            $players = $user->league->players->paginate(10);
        }
        if($user->hasAnyRole(['team_administrator'])){
            $players = $user->team->players->paginate(10);
        }
        if($user->hasAnyRole(['player'])){
            $players = $user->team->players->paginate(10);
        }

        return view('dashboard.players.index',
            ['players' => $players]
        );
    }

	public function profiles()
    {
        return view('dashboard.profiles.index',
            ['profiles' => Profile::all()]
        );
    }

	public function referees()
    {
        return view('dashboard.referees.index',
            ['referees' => Referee::all()]
        );
    }

	public function refereeTypes()
    {
        return view('dashboard.refereeTypes.index',
            ['refereeTypes' => RefereeType::all()]
        );
    }

	public function roles()
    {
        return view('dashboard.roles.index',
            ['roles' => Role::all()]
        );
    }

	public function scores()
    {
        return view('dashboard.scores.index',
            ['scores' => Score::all()]
        );
    }

	public function sports()
    {
        return view('dashboard.sports.index',
            ['sports' => Sport::all()]
        );
    }

	public function teams()
    {

        $user = auth()->user();
        if($user->hasAnyRole(['super-admin','back_office'])){
            $teams = Team::paginate(10);
        }

        if($user->hasAnyRole(['league_administrator'])){
            $teams = $user->league->teams()->paginate(10);
        }

        return view('dashboard.teams.index',
            ['teams' => $teams]
        );
    }

	public function tournament()
    {
        return view('dashboard.tournaments.index',
            ['tournaments' => Tournament::all()]
        );
    }

	public function users()
    {
        return view('dashboard.users.index',
            ['users' => User::all()]
        );
    }
        
    public function getRefereeGames()
    {
        return view('dashboard.referees.games');
    }
}
