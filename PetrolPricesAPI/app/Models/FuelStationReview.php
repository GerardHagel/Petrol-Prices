<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelStationReview extends Model
{
    public function fuelStation()
    {
        return $this->belongsTo(FuelStation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'fuel_station_id',
        'review',  // Dodaj tę właściwość do fillable
        'rating',
    ];

    use HasFactory;
}
