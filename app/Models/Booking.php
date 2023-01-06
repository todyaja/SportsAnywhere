<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function areaRatings(){
        return $this->hasMany(AreaRating::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function user(){
        return $this->belongsTo(User::class, "guest_id", "id");
    }

}
