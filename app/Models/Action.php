<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'game_id',
        'player_id',
        'eventTime'
    ];


    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function game()
    {
        return $this->belongsTo('App\Models\Game');
    }

    public function player()
    {
        return $this->belongsTo('App\Models\Player');
    }
}


