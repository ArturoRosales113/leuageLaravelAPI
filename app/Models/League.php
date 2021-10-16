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
        return $this->belkongsTo('App\Models\User');
    }

    public function sport()
    {
        return $this->belkongsTo('App\Models\Sport');
    }
}



