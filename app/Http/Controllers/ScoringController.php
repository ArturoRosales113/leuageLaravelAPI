<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Score;
use App\Models\Player;
use App\Models\Sport;
use App\Models\Event;

class ScoringController extends Controller
{
    public function gameSetup($id)
    {
        $game = Game::findOrFail($id);
        $teams = $game->teams;
        $sport = $game->league->sport;
        $team1 = $teams[0];
        $team2 = $teams[1];
        $players1 = [];
        foreach ($team1->players as $player) {
            array_push($players1, $player);
        }
        $players2 = [];
        foreach ($team2->players as $player) {
            array_push($players2, $player);
        }
        $team1['players'] = $players1;
        $team2['players'] = $players2;


        return response()->json([
            'game' => $game,
            'team1' => $team1,
            'team2' => $team2,
            'sport' => $sport
        ], 200);
    }
}
