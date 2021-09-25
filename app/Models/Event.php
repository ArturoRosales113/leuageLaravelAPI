<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'display_name', 'sport_id', 'icon_path', 'img_path'
    ];

    public function sport()
    {
        return $this->belongsTo('App\Models\Sport');
    }
}



