<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',                
        'user_id',
        'team_id',
        'numero',
        'edad',
        'estatura',
        'peso',
        'posicion',
        'apodo',
        'is_active',
        'is_captain',
        'icon_path',
        'img_path'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
    public function actions()
    {
        return $this->hasMany(Action::class);
    }
}



