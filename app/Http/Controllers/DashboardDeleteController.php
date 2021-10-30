<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
use App\Models\User;

use App\Http\Traits\ImageManagerTrait;

class DashboardDeleteController extends Controller
{
    //Manipulacion de assets
    use ImageManagerTrait;

   
    public function events($id)
    {
        $event = $vent::findOrFail($id);
        dd($event);
        Alert::success('Éxito', 'Evento eliminado');
        return view('dashboard.events.index');
    }
    public function fields($id)
    {
        $field = Field::findOrFail($id);
        if($field->icon_path != null){
            $this->deleteAsset($player->icon_path);
         }
         if($field->icon_path != null){
            $this->deleteAsset($player->icon_path);
         }
        $field->delete();
        Alert::success('Éxito', 'Cancha eliminado');
        return redirect()->back();
    }
    public function games($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        Alert::success('Éxito', 'Juego eliminada');
        return redirect()->back();
    }
    public function leagues($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return redirect($id)->route('leagues.index');
    }
    public function locations($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.locations.index');
    }
    public function materials($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.materials.index');
    }
    public function modalities($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.modalities.index');
    }
    public function permissions($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.permissions.index');
    }
    public function players($id)
    {
        $player = Player::findOrFail($id);
        $user = User::findOrFail($player->user->id);
        if($player->icon_path != null){
            $this->deleteAsset($player->icon_path);
         }
         if($player->icon_path != null){
            $this->deleteAsset($player->icon_path);
         }
        $player->delete();
        $user->delete();
        Alert::success('Éxito', 'Jugador eliminado');
        return redirect()->back();
    }
    public function profiles($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.profiles.index');
    }
    public function referees($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.referees.index');
    }
    public function refereeTypes($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.refereeTypes.index');
    }
    public function roles($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.roles.index');
    }
    public function scores($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.scores.index');
    }
    public function sports($id)
    {
        $sport = Sport::findOrFail($id);
        dd($sport);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.sports.index');
    }
    public function teams($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.teams.index');
    }
    public function users($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.users.index');
    }
}
