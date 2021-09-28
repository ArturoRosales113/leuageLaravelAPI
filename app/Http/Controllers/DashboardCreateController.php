<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCreateController extends Controller
{
    public function actions()
    {
        return view('dashboard.actions.create');
    }
	public function events()
    {
        return view('dashboard.events.create');
    }
	public function fields()
    {
        return view('dashboard.fields.create');
    }
	public function games()
    {
        return view('dashboard.games.create');
    }
	public function leagues()
    {
        return view('dashboard.leagues.create');
    }
	public function locations()
    {
        return view('dashboard.locations.create');
    }
	public function materials()
    {
        return view('dashboard.materials.create');
    }
	public function modalities()
    {
        return view('dashboard.modalities.create');
    }
	public function permissions()
    {
        return view('dashboard.permissions.create');
    }
	public function players()
    {
        return view('dashboard.players.create');
    }
	public function profiles()
    {
        return view('dashboard.profiles.create');
    }
	public function referees()
    {
        return view('dashboard.referees.create');
    }
	public function refereeTypes()
    {
        return view('dashboard.refereeTypes.create');
    }
	public function roles()
    {
        return view('dashboard.roles.create');
    }
	public function scores()
    {
        return view('dashboard.scores.create');
    }
	public function sports()
    {
        return view('dashboard.sports.create');
    }
	public function teams()
    {
        return view('dashboard.teams.create');
    }
	public function users()
    {
        return view('dashboard.users.create');
    }
}
