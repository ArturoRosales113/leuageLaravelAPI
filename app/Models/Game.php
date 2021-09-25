<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'modality_id',
        'team1_id',
        'team2_id',
        'league_id',
        'field_id',
        'start_time',
        'result1',
        'icon_path',
        'img_path'
    ];

    public function modality()
    {
        return $this->belongsTo('App\Models\Modalitie');
    }

    public function teamOne()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function teamTwo()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function league()
    {
        return $this->belongsTo('App\Models\League');
    }

    public function field()
    {
        return $this->belongsTo('App\Models\Field');
    }
}










