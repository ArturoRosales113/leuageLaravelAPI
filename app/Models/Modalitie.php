<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalitie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'display_name','description', 'icon_path', 'img_path'
    ];

    public function games()
    {
        return $this->hasMany('App\Models\Game');
    }
}
