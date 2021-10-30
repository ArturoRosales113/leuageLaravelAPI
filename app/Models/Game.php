<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'modality_id',
        'league_id',
        'field_id',
        'start_time',
        'result',
        'icon_path',
        'img_path'
    ];

    public function modalitie()
    {
        return $this->belongsTo(Modalitie::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class,'team_game');
    }

    public function referees()
    {
        return $this->belongsToMany(Referee::class,'game_referee');
    }

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}










