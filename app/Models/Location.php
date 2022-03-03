<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [        
        'name',
        'league_id',
        'description',
        'display_name',
        'icon_path',
        'img_path',
        'address',
        'city',
        'state',
        'country',
        'lat',
        'long',
        'tipo_estadio'
    ];

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function fields()
    {
        return $this->hasMany(Field::class);
    }

}

