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
use App\Models\Tournament;
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
        $user = User::findOrFail($league->user->id);     
        if($league->icon_path != null){
            $this->deleteAsset($league->icon_path);
         }
         if($league->icon_path != null){
            $this->deleteAsset($league->icon_path);
         }
        $league->delete();
        $user->delete();
        Alert::success('Éxito', 'Liga eliminada');
        return redirect()->back();
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
        $referee = Referee::findOrFail($id);
        $user = User::findOrFail($referee->user->id);        
        if($referee->icon_path != null){
            $this->deleteAsset($referee->icon_path);
         }
         if($referee->icon_path != null){
            $this->deleteAsset($referee->icon_path);
         }
        $user->delete();
        $referee->delete();
        Alert::success('Éxito', 'Árbitro eliminada');
        return redirect()->back();
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
        $team = Team::findOrFail($id);        
        if($team->icon_path != null){
            $this->deleteAsset($team->icon_path);
         }
         if($team->icon_path != null){
            $this->deleteAsset($team->icon_path);
         }
        $team->delete();
        Alert::success('Éxito', 'Equipo eliminado');
        return redirect()->back();
    }
    public function tournaments($id)
    {
        $tournament = Tournament::findOrFail($id);        
        if($tournament->icon_path != null){
            $this->deleteAsset($tournament->icon_path);
         }
         if($tournament->icon_path != null){
            $this->deleteAsset($tournament->icon_path);
         }
        $tournament->delete();
        Alert::success('Éxito', 'Jugador eliminado');
        return redirect()->back();
    }
    public function users($id)
    {
        $league = League::findOrFail($id);
        dd($league);
        Alert::success('Éxito', 'Liga eliminada');
        return view('dashboard.users.index');
    }
}
