<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaRating extends Model
{
    use HasFactory;
    public $table = "area_ratings";

    public function booking(){
        return $this->belongsTo(Booking::class, "booking_id", "booking_id");
    }

    public function user(){
        return $this->belongsTo(User::class, "guest_id", "id");
    }
}
