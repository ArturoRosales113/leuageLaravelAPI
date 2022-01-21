<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;
use App\Models\Game;
use App\Models\Score;
use App\Models\Player;
use App\Models\Sport;
use App\Models\Tournament;
use App\Models\Event;
use App\Models\User;


class ScoringController extends Controller
{
    public function gameSetup($id)
    {
        $game = Game::with('referees')->findOrFail($id);
        $teams = $game->teams;
        $tournament = $game->tournament;
        $sport = $game->tournament->league->sport;
        $game['teams'][0]['players'] = Player::with('user')->where('team_id','=', $teams[0]->id)->get();
        $game['teams'][1]['players'] = Player::with('user')->where('team_id','=', $teams[1]->id)->get();
        $game['teams'][0]['score'] = 0;
        $game['teams'][1]['score'] = 0;
        $game['teams'][0]['faltas'] = 0;
        $game['teams'][1]['faltas'] = 0;

        return response()->json([
            'game' => $game,
            'tournament' => $tournament,
            'sport' => $sport
        ], 200);
    }

    public function addScore(Request $request)
    {
        $score = Score::create([
            'player_id'=> $request->player_id,
            'game_id'=> $request->game_id,
            'value'=> $request->value,
            'time' => $request->time,
            'period' => $request->period
        ]);
        return response()->json([
            'score' => $score,
        ], 200);
        
    }

    public function addAction(Request $request)
    {
        $action = Action::create([
            'name' => $request->name,
            'player_id'=> $request->player_id,
            'game_id'=> $request->game_id,
            'value'=> $request->value,
            'time' => $request->time,
            'period' => $request->period
        ]);
        return response()->json([
            'action' => $action,
        ], 200);
        
    }

    public function finishGame(Request $request)
    {   
        $game = Game::with('teams')->find($request->game_id);        
        $tournament = Tournament::with('teams')->find($request->tournament_id);

        $game->is_finished = true;        

        $game->teams()->updateExistingPivot($request->team1_id,array('score' => $request->team1_score), true);
        $game->teams()->updateExistingPivot($request->team2_id,array('score' => $request->team2_score), true);

        // //team1 
        $setTeam1 = [];
        $setTeam1['jugados']   =   $tournament->teams->find($request->team1_id)->pivot->jugados + 1;
        $setTeam1['puntos_favor']     =   $tournament->teams->find($request->team1_id)->pivot->puntos_favor + $request->team1_score;
        $setTeam1['puntos_contra']    =   $tournament->teams->find($request->team1_id)->pivot->puntos_contra + $request->team2_score;

        // //team2
        $setTeam2 = [];
        $setTeam2['jugados']   =   $tournament->teams->find($request->team2_id)->pivot->jugados + 1;
        $setTeam2['puntos_favor']     =   $tournament->teams->find($request->team2_id)->pivot->puntos_favor + $request->team2_score;
        $setTeam2['puntos_contra']    =   $tournament->teams->find($request->team2_id)->pivot->puntos_contra + $request->team1_score;

        if($request->team1_score > $request->team2_score){
            $setTeam1['ganados']   =   $tournament->teams->find($request->team1_id)->pivot->ganados + 1;
            $setTeam2['perdidos']  =   $tournament->teams->find($request->team2_id)->pivot->perdidos + 1;
         }else{
            $setTeam2['ganados']   =   $tournament->teams->find($request->team2_id)->pivot->ganados + 1;
            $setTeam1['perdidos']  =   $tournament->teams->find($request->team1_id)->pivot->perdidos + 1;
        }
        
        //update de tablas de posicion
        $tournament->teams()->updateExistingPivot($request->team1_id,$setTeam1, true);
        $tournament->teams()->updateExistingPivot($request->team2_id,$setTeam2, true);

        $tournamentUpdate = Tournament::with('teams')->find($request->tournament_id);
        


        return response()->json([
            'game' => $game,
            'tournament' => $tournamentUpdate
        ], 200);
        
    }
}
