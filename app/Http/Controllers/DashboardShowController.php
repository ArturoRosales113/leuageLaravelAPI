<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardShowController extends Controller
{
    public function actions()
    {
        return view('dashboard.actions.show');
    }
	public function events()
    {
        return view('dashboard.events.show');
    }
	public function fields()
    {
        return view('dashboard.fields.show');
    }
	public function games()
    {
        return view('dashboard.games.show');
    }
	public function leagues()
    {
        return view('dashboard.leagues.show');
    }
	public function locations()
    {
        return view('dashboard.locations.show');
    }
	public function materials()
    {
        return view('dashboard.materials.show');
    }
	public function modalities()
    {
        return view('dashboard.modalities.show');
    }
	public function permissions()
    {
        return view('dashboard.permissions.show');
    }
	public function players()
    {
        return view('dashboard.players.show');
    }
	public function profiles()
    {
        return view('dashboard.profiles.show');
    }
	public function referees()
    {
        return view('dashboard.referees.show');
    }
	public function refereeTypes()
    {
        return view('dashboard.refereeTypes.show');
    }
	public function roles()
    {
        return view('dashboard.roles.show');
    }
	public function scores()
    {
        return view('dashboard.scores.show');
    }
	public function sports()
    {
        return view('dashboard.sports.show');
    }
	public function teams()
    {
        return view('dashboard.teams.show');
    }
	public function users()
    {
        return view('dashboard.users.show');
    }
}
