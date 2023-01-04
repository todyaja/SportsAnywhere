<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'created_by',
        'name',
        'area_type',
        'description',
        'price',
        'address',
        'thumbnail',
        'status',
    ];

    public function areaRatings(){
        return $this->hasMany(AreaRating::class);
    }

    public function areaPictures(){
        return $this->hasMany(AreaPicture::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function areaType(){
        return $this->belongsTo(AreaType::class, "area_type", "id");
    }

    public function user(){
        return $this->belongsTo(User::class, "created_by", "id");
    }
}
