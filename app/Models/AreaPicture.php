<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaPicture extends Model
{
    use HasFactory;
    public $table = "area_pictures";
    protected $fillable = [
        'area_id',
        'pictures',
    ];

    public function area(){
        return $this->belongsTo(Area::class);
    }
}
