<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $fillable = [        
        'user_id',
        'name',
        'sport_id',
        'icon_path',
        'img_path',
        'numero_equipos',
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

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function players()
    {
        return $this->hasManyThrough(Player::class, Team::class);
    }
}



