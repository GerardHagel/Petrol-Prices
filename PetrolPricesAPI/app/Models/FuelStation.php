<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelStation extends Model
{
    protected $fillable = [
        'name',
        'location',
        'fuel_type',
        'price',
        'opening_hours',
    ];
 //   use HasFactory;
}
