<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'fuel_type',
        'price',
        'fuel_station_id',
    ];

    public function fuelStation()
    {
        return $this->belongsTo(FuelStation::class);
    }
}
