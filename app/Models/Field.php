<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'name',
        'display_name',
        'description',
        'icon_path',
        'img_path',
        'location_id',
        'material_id',
        'width',
        'height'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}


