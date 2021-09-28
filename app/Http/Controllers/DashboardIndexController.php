<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardIndexController extends Controller
{
    public function actions()
    {
        return view('dashboard.actions.index');
    }
	public function events()
    {
        return view('dashboard.events.index');
    }
	public function fields()
    {
        return view('dashboard.fields.index');
    }
	public function games()
    {
        return view('dashboard.games.index');
    }
	public function leagues()
    {
        return view('dashboard.leagues.index');
    }
	public function locations()
    {
        return view('dashboard.locations.index');
    }
	public function materials()
    {
        return view('dashboard.materials.index');
    }
	public function modalities()
    {
        return view('dashboard.modalities.index');
    }
	public function permissions()
    {
        return view('dashboard.permissions.index');
    }
	public function players()
    {
        return view('dashboard.players.index');
    }
	public function profiles()
    {
        return view('dashboard.profiles.index');
    }
	public function referees()
    {
        return view('dashboard.referees.index');
    }
	public function refereeTypes()
    {
        return view('dashboard.refereeTypes.index');
    }
	public function roles()
    {
        return view('dashboard.roles.index');
    }
	public function scores()
    {
        return view('dashboard.scores.index');
    }
	public function sports()
    {
        return view('dashboard.sports.index');
    }
	public function teams()
    {
        return view('dashboard.teams.index');
    }
	public function users()
    {
        return view('dashboard.users.index');
    }
}
