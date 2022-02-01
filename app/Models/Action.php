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
    
    
    public function scopeAsistencias($query)
    {
        return $query->where('name', '=', 'Asistencia');
    }
    
    public function scopeRebotes($query)
    {
        return $query->where('name', '=', 'Rebote Defensivo');
    }
    
    public function scopeRebotesofensivo($query)
    {
        return $query->where('name', '=', 'Rebote Ofensivo');
    }

    public function scopeRobos($query)
    {
        return $query->where('name', '=', 'Robo');
    }
    
    public function scopeFaltas($query)
    {
        return $query->where('name', 'LIKE', '%Falta%');
    }
    
    public function scopeFnormales($query)
    {
        return $query->where('name', '=', 'Falta Normal');
    }
    
    public function scopeFtecnicas($query)
    {
        return $query->where('name', '=', 'Falta Técnica');
    }
    
    public function scopeFadeportivas($query)
    {
        return $query->where('name', '=', 'Falta Antideportiva');
    }
}


