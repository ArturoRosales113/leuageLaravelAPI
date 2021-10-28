<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefereeType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','display_name','description','sport_id','icon_path','img_path'
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function referees()
    {
        return $this->hasMany(Referee::class);
    }
}
