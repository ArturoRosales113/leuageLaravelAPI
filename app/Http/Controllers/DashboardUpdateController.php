<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

//Modelos
use App\Models\Event;
use App\Models\Field;
use App\Models\Material;
use App\Models\Modalitie;
use App\Models\League;
use App\Models\Location;
use App\Models\Game;
use App\Models\Sport;
use App\Models\Player;
use App\Models\Referee;
use App\Models\RefereeType;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\User;

use App\Http\Traits\ImageManagerTrait;


class DashboardUpdateController extends Controller
{
      //Manipulacion de assets
    use ImageManagerTrait;
//
    public function sports(Request $request, $id)
    {
        
        $input = $request->all();
         //dd($input);
        $rules = [
            'name' => 'required',
            'description' => 'required|max:1000',
            'img_path' => 'max:2000',
            'icon_path' => 'max:3000'
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {            
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        } else {
            $sport = Sport::find($id);
            $sport->name = Str::slug($input['name'], '-');
            $sport->display_name = $input['name'];
            $sport->description = $input['description'];
            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                if($sport->icon_path != null){
                    $this->deleteAsset($sport->icon_path);
                }
                $iconFile = $request->file('icon_path');
                $sport->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                if($sport->img_path != null){
                    $this->deleteAsset($sport->img_path);
                }
                $imageFile = $request->file('img_path');
                $sport->img_path = $this->createImage($imageFile);
            }  
            
            $sport->save();          
        Alert::success('Éxito', 'Deporte Actualizado');
        return redirect()->route('sports.index');
        }
    }
  //
    public function leagues(Request $request, $id)
    {
        $input = $request->all();
        
        $league = League::find($id);
        $user = User::firstWhere('email', $league->user->email);
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'description' => 'max:1000',
            'icon_path' => 'max:3000|mimes:jpg,bmp,png',
            'img_path' => 'max:3000|mimes:jpg,bmp,png',
            'sport_id' => 'required|not_in:0',
            'reglamento_path' => 'mimes:pdf|max:5000'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {        
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $user->name = $input['name'];
            $user->email =  $input['email'];
            $user->save();              
            $league->user_id = $user->id;
            $league->name = $input['name'];
            $league->sport_id = $input['sport_id'];
            $league->description = $input['description'];
            
            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                if($league->icon_path != null){
                    $this->deleteAsset($league->icon_path);
                }
                $iconFile = $request->file('icon_path');
                $league->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                if($league->img_path != null){
                    $this->deleteAsset($league->img_path);
                }
                $imageFile = $request->file('img_path');
                $league->img_path = $this->createImage($imageFile);
            }
            if (array_key_exists('reglamento_path', $input) && $input['reglamento_path'] != null) {
                if($league->reglamento_path != null){
                    $this->deleteAsset($league->reglamento_path);
                }
                $pdfFile = $request->file('reglamento_path');
                $league->reglamento_path = $this->createPDF($pdfFile);
            }
            $league->save();
            Alert::success('Éxito', 'Liga actualizada');
            return redirect()->route('leagues.index');
        }
    }

  //
    public function tournaments(Request $request, $id)
    {
            
            $input = $request->all();
            $rules = [
                'name' => 'required',
                'description' => 'max:1000',
                'reglamento_path' => 'mimes:pdf|max:5000',
                'category_id' => 'required|not_in:0',
                'league_id' => 'required|not_in:0',
                'number_teams' => 'required|numeric', 
                'gameday' => 'required', 
                'number_periods' => 'required|numeric',
                'extra_time_periods' => 'required|not_in:0',
                'period_lenght' => 'required|not_in:0', 
                'time_offs' => 'required|numeric|not_in:0', 
                'extra_time' => 'required|numeric|not_in:0',
                'number_teams_playoffs' => 'required|numeric', 
                'icon_path' => 'max:3000|mimes:jpg,bmp,png',
                'img_path' => 'max:3000|mimes:jpg,bmp,png' 
            ];

            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                //dd($input);
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            } else {
                //dd($input);
                $tournament = Tournament::findOrFail($id);
                $tournament->name = $input['name'];
                $tournament->league_id = $input['league_id'];
                $tournament->category_id = $input['category_id'];
                $tournament->number_teams = $input['number_teams'];
                $tournament->number_teams_playoffs = $input['number_teams_playoffs'];
                $tournament->description = $input['description'];
                $tournament->number_periods = $input['number_periods'];
                $tournament->period_lenght = $input['period_lenght'];
                $tournament->time_offs = $input['time_offs']; 
                $tournament->extra_time_periods = $input['extra_time_periods'];
                $tournament->extra_time = $input['extra_time'];
                $tournament->gameday = $input['gameday']; 
                
                

                if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                    $iconFile = $request->file('icon_path');
                    $tournament->icon_path = $this->createIcon($iconFile);
                }
                if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                    $imageFile = $request->file('img_path');
                    $tournament->img_path = $this->createImage($imageFile);
                }
                if (array_key_exists('reglamento_path', $input) && $input['reglamento_path'] != null) {
                    $pdfFile = $request->file('reglamento_path');
                    $tournament->reglamento_path = $this->createPDF($pdfFile);
                }

                $tournament->save();
                Alert::success('Éxito', 'Torneo editado');
                return redirect()->route('leagues.show', $request->league_id);
            }
        }
  //
    public function teams(Request $request, $id)
    {
        $input = $request->all();        
        $rules = [
            'name' => 'required',
            'description' => 'max:1000',
            'league_id' => 'required|not_in:0', 
            'icon_path' => 'max:3000|mimes:jpg,bmp,png',
            'img_path' => 'max:3000|mimes:jpg,bmp,png'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            
            $team = Team::find($id);
            $team->name = $input['name'];
            $team->description = $input['description'];
            $team->league_id = $input['league_id'];  
            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                if($team->icon_path != null){
                    $this->deleteAsset($team->icon_path);
                }
                $iconFile = $request->file('icon_path');
                $team->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                if($team->img_path != null){
                    $this->deleteAsset($team->img_path);
                }
                $imageFile = $request->file('img_path');
                $team->img_path = $this->createImage($imageFile);
            }
            $team->save();
            Alert::success('Éxito', 'Equipo modificado');
            return redirect()->route('teams.show', $id);
        }
    }

    public function events(Request $request, $id)
    {
        $input = $request->all();        
        $rules = [
            'name' => 'required',
            'description' => 'max:1000',
            'sport_id' => 'required|not_in:0',
            'icon_path' => 'max:3000|mimes:jpg,bmp,png',
            'img_path' => 'max:3000|mimes:jpg,bmp,png'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $event = Event::create([
                'name'=>  Str::slug($input['name'], '-'),
                'display_name'=> $input['name'],
                'description'=> $input['description'],
                'sport_id' => $input['sport_id']
            ]);
            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                $iconFile = $request->file('icon_path');
                $event->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                $imageFile = $request->file('img_path');
                $event->img_path = $this->createImage($imageFile);
            }
            $event->save();
            Alert::success('Éxito', 'Evento creado');
            return redirect()->route('events.index');
        }
    }
    
    public function materials(Request $request, $id)
    {
        $input = $request->all();        
        $rules = [
            'name' => 'required',
            'description' => 'max:1000',
            'icon_path' => 'max:3000|mimes:jpg,bmp,png',
            'img_path' => 'max:3000|mimes:jpg,bmp,png'
        ];   
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {            
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            
            
            $material = Material::find($id);
            $material->name =  Str::slug($input['name'], '-');
            $material->display_name = $input['name'];
            $material->description = $input['description'];
            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                $iconFile = $request->file('icon_path');
                $material->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                $imageFile = $request->file('img_path');
                $material->img_path = $this->createImage($imageFile);
            }
            $material->save();
            Alert::success('Éxito', 'Material editado');
            return redirect()->route('locations.index');
        }
    }
    public function modalities(Request $request, $id)
    {
        $input = $request->all();
          //dd($input);
        $rules = [
            'name' => 'required',
            'description' => 'max:1000',
            'icon_path' => 'max:3000|mimes:jpg,bmp,png',
            'img_path' => 'max:3000|mimes:jpg,bmp,png'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {        
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $modalitie = Modalitie::find($id);
            $modalitie->name =  Str::slug($input['name'], '-');
            $modalitie->display_name = $input['name'];
            $modalitie->description = $input['description'];
            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                if($modalitie->icon_path != null){
                    $this->deleteAsset($modalitie->icon_path);
                }
                $iconFile = $request->file('icon_path');
                $modalitie->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                if($modalitie->img_path != null){
                    $this->deleteAsset($modalitie->img_path);
                }
                $imageFile = $request->file('img_path');
                $modalitie->img_path = $this->createImage($imageFile);
            }
            $modalitie->save();
            Alert::success('Éxito', 'Modalidad editada');
            return redirect()->route('modalities.index');
        }
    }
  //
    public function locations(Request $request, $id)
    {
        $input = $request->all();        
        $rules = [
            'name' => 'required',
            'description' => 'max:1000',
            'address' => 'required|max:1000',
            'city' => 'max:1000',
            'state' => 'max:1000',
            'country' => 'max:1000',
            'tipo_estadio' => 'required|not_in:0',
            'league_id' => 'required|not_in:0', 
            'icon_path' => 'max:3000|mimes:jpg,bmp,png',
            'img_path' => 'max:3000|mimes:jpg,bmp,png'
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $location = Location::find($id);
            $location->name = Str::slug($input['name'], '-');
            $location->display_name = $input['name'];
            $location->description = $input['description'];
            $location->address = $input['address'];
            $location->tipo_estadio = $input['tipo_estadio'];
            $location->city = $input['city'];
            $location->state = $input['state'];
            $location->league_id = $input['league_id'];  
            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                if($location->icon_path != null){
                    $this->deleteAsset($location->icon_path);
                }
                $iconFile = $request->file('icon_path');
                $location->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                if($location->img_path != null){
                    $this->deleteAsset($location->img_path);
                }
                $imageFile = $request->file('img_path');
                $location->img_path = $this->createImage($imageFile);
            }
            $location->save();  
            Alert::success('Éxito', 'Estadio editado');
            return redirect()->route('locations.index');
        }
    }
  //
    public function fields(Request $request, $id)
    {
        $input = $request->all();
          //dd($input);
        $rules = [
            'name' => 'required',
            'description' => 'max:1000',
            'width' => 'max:1000',
            'height' => 'max:1000',
            'location_id' => 'required|not_in:0', 
            'material_id' => 'required|not_in:0', 
            'icon_path' => 'max:3000|mimes:jpg,bmp,png',
            'img_path' => 'max:3000|mimes:jpg,bmp,png'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
              //dd($validator);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $field = Field::find($id);
            $field->name = Str::slug($input['name'], '-');
            $field->display_name = $input['name'];
            $field->description = $input['description'];
            $field->width = $input['width'];
            $field->height = $input['height'];
            $field->location_id = $input['location_id']; 
            $field->material_id = $input['material_id']; 
            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                if($field->icon_path != null){
                    $this->deleteAsset($field->icon_path);
                }
                $iconFile = $request->file('icon_path');
                $field->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                if($field->img_path != null){
                    $this->deleteAsset($field->img_path);
                }
                $imageFile = $request->file('img_path');
                $field->img_path = $this->createImage($imageFile);
            }
            $field->save();
            Alert::success('Éxito', 'Campo editado');
            return redirect()->route('locations.show', $input['location_id']);
        }
    }
  //
    public function players(Request $request, $id)
    {
        $input = $request->all();
        $player = Player::find($id);
        $user = User::find($player->user->id);
        $input = $request->all();        
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'team_id' => 'required|not_in:0',
            'icon_path' => 'max:3000|mimes:jpg,bmp,png',
            'img_path' => 'max:3000|mimes:jpg,bmp,png',
            'numero' => 'required|not_in:0',
            'edad' => 'required|not_in:0',
            'estatura' => 'required',
            'peso' => 'required'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $user->name = $input['name'];
            $user->email =  $input['email'];
            if (array_key_exists('password', $input))
            {
                $user->password = Hash::make($input['password']);
            }
            $user->save();
            $player->user_id = $user->id;
            $player->team_id = $input['team_id'];
            $player->edad = $input['edad'];
            $player->apodo = $input['apodo'];
            $player->posicion = $input['posicion'];
            $player->estatura = $input['estatura'];
            $player->numero = $input['numero'];
            $player->peso = $input['peso'];
            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                if($player->icon_path != null){
                    $this->deleteAsset($player->icon_path);
                }
                $iconFile = $request->file('icon_path');
                $player->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                if($player->img_path != null){
                    $this->deleteAsset($player->img_path);
                }
                $imageFile = $request->file('img_path');
                $player->img_path = $this->createImage($imageFile);
            }

            $player->save();
            Alert::success('Éxito', 'Jugador Editado');
            return redirect()->route('players.index');
        }
    }

    public function referees(Request $request, $id)
    {
        $input = $request->all();
        $referee = Referee::find($id);
        $user = User::find($referee->user->id);
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'referee_type_id' => 'required|not_in:0',
            'league_id' => 'required|not_in:0',
            'icon_path' => 'max:3000|mimes:jpg,bmp,png',
            'img_path' => 'max:3000|mimes:jpg,bmp,png',
            'edad' => 'required',
            'estatura' => 'required',
            'peso' => 'required'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $user->name = $input['name'];
            $user->email =  $input['email'];
            $user->save();  
            $referee->user_id = $user->id;
            $referee->refereeType_id = $input['referee_type_id'];
            $referee->league_id = $input['league_id'];
            $referee->edad = $input['edad'];
            $referee->licencia = $input['licencia'];
            $referee->estatura = $input['estatura'];
            $referee->peso = $input['peso'];

            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                if($referee->icon_path != null){
                    $this->deleteAsset($referee->icon_path);
                }
                $iconFile = $request->file('icon_path');
                $referee->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                if($referee->img_path != null){
                    $this->deleteAsset($referee->img_path);
                }
                $imageFile = $request->file('img_path');
                $referee->img_path = $this->createImage($imageFile);
            }
            $referee->save();
            Alert::success('Éxito', 'Referee modificado');
            return redirect()->route('referees.index');
        }
    }
  //
    public function refereeTypes(Request $request, $id)
    {
        $input = $request->all();
        $rules = [
            'name' => 'required',
            'description' => 'max:1000',
            'sport_id' => 'required|not_in:0',
            'icon_path' => 'max:3000|mimes:jpg,bmp,png',
            'img_path' => 'max:3000|mimes:jpg,bmp,png'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            
            $rt = RefereeType::find($id);        
            $rt->name =  Str::slug($input['name'], '-');
            $rt->display_name = $input['name'];
            $rt->description = $input['description'];
            $rt->sport_id = $input['sport_id'];            
            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                if($rt->icon_path != null){
                    $this->deleteAsset($rt->icon_path);
                }
                $iconFile = $request->file('icon_path');
                $rt->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                if($rt->img_path != null){
                    $this->deleteAsset($rt->img_path);
                }
                $imageFile = $request->file('img_path');
                $rt->img_path = $this->createImage($imageFile);
            }
            $rt->save();
            Alert::success('Éxito', 'Tipo de referee Editado');
            return redirect()->route('referees.index');
        }
    }

    public function games(Request $request, $id)
    {
        $input = $request->all();
        //dd($input);
        $rules = [
            'field_id' => 'required|not_in:0',
            'start_time' => 'required',
            'referee_id' => 'required|not_in:0',
        ]; 
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $input = $request->all();
            $game = Game::find($id);
            $game->field_id = $input['field_id'];
            $game->start_time = $input['start_time'];
            $game->referees()->attach($input['referee_id']);
            $game->save();
            Alert::success('Éxito', 'Juego programado');
            return redirect()->route('tournaments.show', $game->tournament_id);
        } 
    }
}
