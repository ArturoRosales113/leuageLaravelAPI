<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'display_name','description','icon_path', 'img_path'
    ];

    public function fields(){
        return $this->hasMany('App\Models\Field');
    }

    public function leagues()
    {
        return $this->hasMany('App\Models\League');
    }

    public function teams()
    {
        return $this->hasMany('App\Models\Team');
    }

    public function players()
    {
        return $this->hasMany('App\Models\Player');
    }
    
}
