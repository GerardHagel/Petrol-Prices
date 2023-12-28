<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelPrice extends Model
{
    protected $fillable = ['fuel_station_id', 'fuel_type', 'price', 'date'];

    //use HasFactory;

    public function fuelStation()
    {
        return $this->belongsTo(FuelStation::class);
    }

}
