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
        return $this->hasMany(Field::class);
    }

    public function leagues()
    {
        return $this->hasMany(League::class);
    }

    public function teams()
    {
        return $this->hasManyThrough(Team::class, League::class);
    }


}
