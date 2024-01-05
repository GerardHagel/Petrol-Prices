<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FuelStation;
use App\Models\FuelStationReview;

class FuelStationReviewController extends Controller
{
    public function addReview(Request $request, FuelStation $fuelStation)
    {
        $request->validate([
            'review' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        $review = new FuelStationReview([
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
        ]);

        $fuelStation->reviews()->save($review);

        return response()->json(['message' => 'Recenzja została dodana'], 201);
    }

    public function getAverageRating(FuelStation $fuelStation)
    {
        $averageRating = $fuelStation->reviews()->avg('rating');

        return response()->json(['averageRating' => $averageRating]);
    }
}
