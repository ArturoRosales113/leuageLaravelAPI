<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardEditController extends Controller
{
    public function actions()
    {
        return view('dashboard.actions.edit');
    }
	public function events()
    {
        return view('dashboard.events.edit');
    }
	public function fields()
    {
        return view('dashboard.fields.edit');
    }
	public function games()
    {
        return view('dashboard.games.edit');
    }
	public function leagues()
    {
        return view('dashboard.leagues.edit');
    }
	public function locations()
    {
        return view('dashboard.locations.edit');
    }
	public function materials()
    {
        return view('dashboard.materials.edit');
    }
	public function modalities()
    {
        return view('dashboard.modalities.edit');
    }
	public function permissions()
    {
        return view('dashboard.permissions.edit');
    }
	public function players()
    {
        return view('dashboard.players.edit');
    }
	public function profiles()
    {
        return view('dashboard.profiles.edit');
    }
	public function referees()
    {
        return view('dashboard.referees.edit');
    }
	public function refereeTypes()
    {
        return view('dashboard.refereeTypes.edit');
    }
	public function roles()
    {
        return view('dashboard.roles.edit');
    }
	public function scores()
    {
        return view('dashboard.scores.edit');
    }
	public function sports()
    {
        return view('dashboard.sports.edit');
    }
	public function teams()
    {
        return view('dashboard.teams.edit');
    }
	public function users()
    {
        return view('dashboard.users.edit');
    }
}
