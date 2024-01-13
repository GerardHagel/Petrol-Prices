<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FuelStation;
use App\Models\FuelStationReview;

class FuelStationReviewController extends Controller
{
    public function addReview(Request $request, FuelStation $fuelStation)
    {
      //  dd('Przed przetworzeniem żądania', $request->all());

        $request->validate([
            'review' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        $review = new FuelStationReview([
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
        ]);

        $fuelStation->reviews()->save($review);

        dd('Po przetworzeniu żądania', $request->all());

        return response()->json(['message' => 'Recenzja została dodana'], 201);

    }

    public function getAverageRating(FuelStation $fuelStation)
    {
        $averageRating = $fuelStation->reviews()->avg('rating');

        return response()->json(['averageRating' => $averageRating]);
    }
}
