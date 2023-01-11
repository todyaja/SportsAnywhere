<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaType extends Model
{
    use HasFactory;
    protected $table = 'area_types';

    public function areas(){
        return $this->hasMany(Area::class, "area_type");
    }
}
