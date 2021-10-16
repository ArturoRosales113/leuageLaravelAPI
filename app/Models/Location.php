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
        'display_name',
        'description',
        'icon_path',
        'img_path',
        'address',
        'city',
        'state',
        'country',
        'lat',
        'long'
    ];
}

