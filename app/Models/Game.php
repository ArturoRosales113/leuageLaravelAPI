<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'modality_id',
        'tournament_id',
        'field_id',
        'start_time',
        'icon_path',
        'img_path',
        'ronda',
        'is_finished',
        'is_free',
    ];

    public function modalitie()
    {
        return $this->belongsTo(Modalitie::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class,'team_game')->withPivot(['score']);
    }

    public function referees()
    {
        return $this->belongsToMany(Referee::class,'game_referee');
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }


}










