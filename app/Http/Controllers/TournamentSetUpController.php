<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Tournament;
use App\Models\Team;
use App\Models\Game;
use App\Games\GameCreator;

class TournamentSetUpController extends Controller
{
    public function addTeam(Request $request){

        $tournament = Tournament::findOrFail($request->tournament_id);
        $team = Team::findOrFail($request->team_id);
        $tournament->teams()->attach($team->id);
        
        Alert::success('Éxito', $team->name.' ha sido añadido al torneo.');
        return redirect()->route('tournaments.show', $tournament->id);
    }

    public function setGames($id)
    {
        $tournament = Tournament::findOrFail($id);
        $teams = $tournament->teams()->allRelatedIds()->toArray();
        $fix = new GameCreator(array_values($teams));
        $schedule = $fix->getSchedule();
        $i = 1;

        if(count($teams) % 2 == 0){
            foreach($schedule as $rounds){
                
                foreach($rounds as $game){
                    $team1 = Team::find($game[0]);
                    $team2 = Team::find($game[1]);
                    $sg = Game::create([
                        'modality_id' => 1,
                        'uid' => Str::random(3).'-'.Str::random(4).'-'.Str::random(3),
                        'tournament_id' => $tournament->id,
                        'ronda' => $i,                        
                    ]);
                    $sg->teams()->attach([$team1->id, $team2->id]);
                }                
                $i++;
            }
        }else{

            //dd($schedule);
            foreach($schedule as $rounds){

                foreach($rounds as $match){

                    $sg = Game::create([
                        'modality_id' => 1,
                        'tournament_id' => $tournament->id,
                        'ronda' => $i,                        
                    ]);

                    if($match[0] == "free this round"){

                        $sg->is_free = true;
                        $team1 = Team::find($match[1]);
                        $sg->teams()->attach($team1->id);

                    }elseif($match[1] == "free this round"){

                        $sg->is_free = true;
                        $team1 = Team::find($match[0]);
                        $sg->teams()->attach($team1->id);

                    }else{

                        $team1 = Team::find($match[0]);
                        $team2 = Team::find($match[1]);
                        $sg->teams()->attach([$team1->id, $team2->id]);

                    }

                    $sg->save();
                }
                $i++;
            }  
        }

        Alert::success('Éxito', 'El rol de juegos ha sido creado.');
        return redirect()->route('tournaments.show', $tournament->id);
    }

    public function getTable($id)
    {
        $tournament = Tournament::with('positions')->find($id);
        $contenders = $tournament->positions->take($tournament->number_teams_playoffs)->toArray();
        $po_predictions = [];
        $i = 0;
        while((count($contenders) > 0) && (count($contenders)% 2 == 0 ))
        {
            $po_predictions[$i][0] = array_shift($contenders);
            $po_predictions[$i][1] = array_pop($contenders);
            $i++;
        }
        //dd($po_predictions);
        return view('dashboard.tournaments.table', [
            'tournament' => $tournament,
            'predicciones' => $po_predictions
        ]);
    }

    public function getEstadisticas($id)
    {
        $tournament = Tournament::with(['actions','scores'])->find($id);
        return view('dashboard.tournaments.estadisticas', ['tournament' => $tournament]);
    }

    public function getOportunidades($id)
    {
        $tournament = Tournament::with('positions')->find($id);
        return view('dashboard.tournaments.oportunidades', ['tournament' => $tournament]);
    }


}
