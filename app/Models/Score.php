<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
    'game_id',
    'player_id',
    'value',
    'time',
    'period'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
     
    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function scopeSencillos($query)
    {
        return $query->where('value', '=', 1);
    }

    public function scopeDobles($query)
    {
        return $query->where('value', '=', 2);
    }

    public function scopeTriples($query)
    {
        return $query->where('value', '=', 3);
    }



}
