<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Score;
use App\Models\Player;
use App\Models\Sport;
use App\Models\Event;
use App\Models\User;


class ScoringController extends Controller
{
    public function gameSetup($id)
    {
        $game = Game::with('referees')->findOrFail($id);
        $teams = $game->teams;
        $sport = $game->league->sport;
        $game['teams'][0]['players'] = Player::with('user')->where('team_id','=', $teams[0]->id)->get();
        $game['teams'][1]['players'] = Player::with('user')->where('team_id','=', $teams[1]->id)->get();

        return response()->json([
            'game' => $game,
            'sport' => $sport
        ], 200);
    }
}
