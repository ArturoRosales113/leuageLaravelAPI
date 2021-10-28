<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    use HasFactory;

    protected $fillable = [                
        'user_id',
        'refereeType_id',
        'numero',
        'edad',
        'estatura',
        'peso',
        'is_active',
        'icon_path',
        'img_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function refereetype()
    {
        return $this->belongsTo(RefereeType::class);
    }

}



