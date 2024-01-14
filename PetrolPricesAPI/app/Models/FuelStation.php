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

    public function fuelPrices()
    {
        return $this->hasMany(FuelPrice::class);
    }

    public function reviews()
    {
        return $this->hasMany(FuelStationReview::class);
    }
    use HasFactory;



}
