<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'game_id',
        'player_id',
        'time',
        'period'
    ];

    public function game()
    {
        return $this->belongsTo(Gamme::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}


