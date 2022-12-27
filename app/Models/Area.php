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
}
