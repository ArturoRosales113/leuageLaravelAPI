<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'name',
        'description',
        'league_id',
        'icon_path',
        'img_path',
        'user_id'
    ];

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class,'team_tournament')->withPivot(['position','jugados','ganados','perdidos','empates', 'puntos_favor', 'puntos_contra']);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class,'team_game')->withPivot(['score']);
    }
}


