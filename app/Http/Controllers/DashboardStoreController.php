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
use App\Models\Sport;
use App\Models\Player;
use App\Models\Referee;
use App\Models\RefereeType;
use App\Models\Team;
use App\Models\User;
use App\Models\Game;

use App\Http\Traits\ImageManagerTrait;

class DashboardStoreController extends Controller
{
    //Manipulacion de assets
    use ImageManagerTrait;

    public function sports(Request $request)
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
           //dd($validator);
           return redirect()->back()
          ->withErrors($validator)
          ->withInput();
       } else {
            
            $sport = Sport::create([
                'name' => Str::slug($input['name'], '-'),
                'display_name' => $input['name'],
                'description' => $input['description']                
            ]);

            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                $iconFile = $request->file('icon_path');
                $sport->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                $imageFile = $request->file('img_path');
                $sport->img_path = $this->createImage($imageFile);
            }

            $sport->save();
        
        Alert::success('Éxito', 'Deporte creado');
        return redirect()->route('sports.index');
       }
    }

    public function leagues(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $rules = [
         'name' => 'required',
         'email' => 'required|email|unique:users',
         'description' => 'max:1000',
         'icon_path' => 'max:3000|mimes:jpg,bmp,png',
         'img_path' => 'max:3000|mimes:jpg,bmp,png',
         'sport_id' => 'required|not_in:0',
         'reglamento_path' => 'mimes:pdf|max:5000',
         'numero_equipos' => 'required|not_in:0'
        ];
 
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            //dd($validator);
            return redirect()->back()
           ->withErrors($validator)
           ->withInput();
        } else {
            $user = User::create([
                'name' => $input['name'],
                'email' =>  $input['email'],
                'password' => Hash::make(Str::random(10))
            ]);

            $league = League::create([
                'user_id' => $user->id,
                'name' => $input['name'],
                'sport_id' => $input['sport_id'],
                'numero_equipos' => $input['numero_equipos'],
                'description' => $input['description']                
            ]);

            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                $iconFile = $request->file('icon_path');
                $league->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                $imageFile = $request->file('img_path');
                $league->img_path = $this->createImage($imageFile);
            }
            if (array_key_exists('reglamento_path', $input) && $input['reglamento_path'] != null) {
                $pdfFile = $request->file('reglamento_path');
                $league->reglamento_path = $this->createPDF($pdfFile);
            }

            $league->save();
            Alert::success('Éxito', 'Liga creada');
            return redirect()->route('leagues.index');
        }
    }

    public function teams(Request $request)
    {
        $input = $request->all();
        
        $rules = [
            'name' => 'required',
            'captain_name' => 'required',
            'email' => 'required|email',
            'description' => 'required|max:1000',
            'league_id' => 'required|not_in:0', 
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

            $team = Team::create([
                'name'=> $input['name'],
                'description'=> $input['description'],
                'league_id' => $input['league_id'],
                'description' => $input['description']
            ]);

            $captain = User::create([
                'name' => $input['captain_name'],
                'email' =>  $input['email'],
                'password' => Hash::make(Str::random(10))
            ]);

            $player = Player::create([
                'user_id' => $captain->id,
                'team_id' => $team->id,
                'is_active' => true,
                'is_captain' => true                
            ]);

            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                $iconFile = $request->file('icon_path');
                $team->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                $imageFile = $request->file('img_path');
                $team->img_path = $this->createImage($imageFile);
            }

            $team->save();
            Alert::success('Éxito', 'Equipo creado');
            return redirect()->route('teams.index');
        }
    }

    public function events(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $rules = [
            'name' => 'required',
            'description' => 'max:1000',
            'sport_id' => 'required|not_in:0',
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

    public function materials(Request $request)
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
            //dd($validator);
            return redirect()->back()
           ->withErrors($validator)
           ->withInput();
        } else {

            $material = Material::create([
                'name'=>  Str::slug($input['name'], '-'),
                'display_name'=> $input['name'],
                'description'=> $input['description']
            ]);

            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                $iconFile = $request->file('icon_path');
                $material->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                $imageFile = $request->file('img_path');
                $material->img_path = $this->createImage($imageFile);
            }

            $material->save();

            Alert::success('Éxito', 'Material creado');
            return redirect()->route('locations.index');
        }
    }

    public function modalities(Request $request)
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
            //dd($validator);
            return redirect()->back()
           ->withErrors($validator)
           ->withInput();
        } else {

            $modalitie = Modalitie::create([
                'name'=>  Str::slug($input['name'], '-'),
                'display_name'=> $input['name'],
                'description'=> $input['description']
            ]);

            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                $iconFile = $request->file('icon_path');
                $modalitie->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                $imageFile = $request->file('img_path');
                $modalitie->img_path = $this->createImage($imageFile);
            }

            $modalitie->save();

            Alert::success('Éxito', 'Modalidad creado');
            return redirect()->route('modalities.index');
        }
    }

    public function locations(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $rules = [
            'name' => 'required',
            'description' => 'max:1000',
            'address' => 'required|max:1000',
            'city' => 'max:1000',
            'state' => 'max:1000',
            'country' => 'max:1000',
            'lat' => 'max:1000',
            'long' => 'max:1000',
            'league_id' => 'required|not_in:0', 
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

            $location = Location::create([
                'name' => Str::slug($input['name'], '-'),
                'display_name' => $input['name'],
                'description'=> $input['description'],
                'address' => $input['address'],
                'city' => $input['city'],
                'state' => $input['state'],
                'lat' => $input['lat'],
                'long' => $input['long'],
                'league_id' => $input['league_id']
            ]);

            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                $iconFile = $request->file('icon_path');
                $location->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                $imageFile = $request->file('img_path');
                $location->img_path = $this->createImage($imageFile);
            }

            $location->save();

            Alert::success('Éxito', 'Estadio creado');
            return redirect()->route('locations.index');
        }
    }

    public function fields(Request $request)
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

            $field = Field::create([
                'name' => Str::slug($input['name'], '-'),
                'display_name' => $input['name'],
                'description'=> $input['description'],
                'width' => $input['width'],
                'height' => $input['height'],
                'location_id' => $input['location_id'], 
                'material_id' => $input['material_id'], 
            ]);

            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                $iconFile = $request->file('icon_path');
                $field->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                $imageFile = $request->file('img_path');
                $field->img_path = $this->createImage($imageFile);
            }

            $field->save();

            Alert::success('Éxito', 'Campo creado');
            return redirect()->back();
        }
    }

    public function players(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $rules = [
         'name' => 'required',
         'email' => 'required|email|unique:users',
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
            //dd($validator);
            return redirect()->back()
           ->withErrors($validator)
           ->withInput();
        } else {

            $user = User::create([
                'name' => $input['name'],
                'email' =>  $input['email'],
                'password' => Hash::make(Str::random(10))
            ]);

            $player = Player::create([
                'user_id' => $user->id,
                'team_id' => $input['team_id'],
                'edad' => $input['edad'],
                'apodo' => $input['apodo'],
                'posicion' => $input['posicion'],
                'estatura' => $input['estatura'],
                'numero' => $input['numero'],
                'peso' => $input['peso'],                
                'is_active' => true,
                'is_captain' => false                     
            ]);

            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                $iconFile = $request->file('icon_path');
                $player->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                $imageFile = $request->file('img_path');
                $player->img_path = $this->createImage($imageFile);
            }

            $player->save();
            Alert::success('Éxito', 'Jugador creado');
            return redirect()->back();
        }
    }

    public function referees(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $rules = [
         'name' => 'required',
         'email' => 'required|email|unique:users',
         'referee_type_id' => 'required|not_in:0',
         'icon_path' => 'max:3000|mimes:jpg,bmp,png',
         'img_path' => 'max:3000|mimes:jpg,bmp,png',
         'edad' => 'required|not_in:0',
         'estatura' => 'required',
         'peso' => 'required'
        ];
 
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            //dd($validator);
            return redirect()->back()
           ->withErrors($validator)
           ->withInput();
        } else {

            $user = User::create([
                'name' => $input['name'],
                'email' =>  $input['email'],
                'password' => Hash::make(Str::random(10))
            ]);

            $referee = Referee::create([
                'user_id' => $user->id,
                'name' => $input['name'],
                'refereeType_id' => $input['referee_type_id'],
                'edad' => $input['edad'],
                'estatura' => $input['estatura'],
                'peso' => $input['peso'],                
                'is_active' => true                
            ]);

            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                $iconFile = $request->file('icon_path');
                $referee->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                $imageFile = $request->file('img_path');
                $referee->img_path = $this->createImage($imageFile);
            }

            $referee->save();
            Alert::success('Éxito', 'Referee creado');
            return redirect()->route('referees.index');
        }
    }

    public function refereeTypes(Request $request)
    {
        $input = $request->all();
        //dd($input);
        $rules = [
            'name' => 'required',
            'description' => 'max:1000',
            'sport_id' => 'required|not_in:0',
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

            $rt = RefereeType::create([
                'name'=>  Str::slug($input['name'], '-'),
                'display_name'=> $input['name'],
                'description'=> $input['description'],
                'sport_id' => $input['sport_id']
            ]);

            if (array_key_exists('icon_path', $input) && $input['icon_path'] != null) {
                $iconFile = $request->file('icon_path');
                $rt->icon_path = $this->createIcon($iconFile);
            }
            if (array_key_exists('img_path', $input) && $input['img_path'] != null) {
                $imageFile = $request->file('img_path');
                $rt->img_path = $this->createImage($imageFile);
            }

            $rt->save();
            Alert::success('Éxito', 'Tipo de referee creado');
            return redirect()->route('referees.index');
        }
    }

    public function games(Request $request)
    {
        //dd($request->all());
        $input = $request->all();

        $game = Game::create([
            'modality_id' => $input['modality_id'],
            'league_id' => $input['league_id'],
            'field_id' => $input['field_id'],
            'start_time' => $input['start_time'],
        ]);
        $game->teams()->attach($input['teams']);
        $game->referees()->attach($input['referee_id']);
        Alert::success('Éxito', 'Juego programado');
        return redirect()->back();
    } 

}
