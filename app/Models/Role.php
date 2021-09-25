<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'display_name','description', 'sport_id', 'icon_path', 'img_path'
    ];

    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }
}
