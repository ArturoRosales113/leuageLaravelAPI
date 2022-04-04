<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',        
        'user_id',
        'name',
        'sport_id',
        'icon_path',
        'img_path',
        'description',
        'reglamento_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function games()
    {
        return $this->hasManyThrough(Game::class, Tournament::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }

    public function referees()
    {
        return $this->hasMany(Referee::class);
    }

    public function players()
    {
        return $this->hasManyThrough(Player::class, Team::class);
    }

    public function fields()
    {
        return $this->hasManyThrough(Field::class, Location::class);
    }
}



