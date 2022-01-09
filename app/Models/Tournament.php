<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'league_id',
        'name',
        'icon_path',
        'img_path',
        'number_teams',
        'gameday',
        'number_periods',
        'period_lenght',
        'time_offs',
        'number_teams_playoffs',
        'extra_time',
        'is_extra_time',
        'description',
        'reglamento_path',
        'extra_time_periods',
        'is_active'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function league()
    {
        return $this->belongsTo(League::class);
    }

}



