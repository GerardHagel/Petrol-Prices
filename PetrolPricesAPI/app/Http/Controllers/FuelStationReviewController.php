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

        // Sprawdź, czy użytkownik jest zalogowany
        $userId = auth()->id();

        if (!$userId) {
            return response()->json(['message' => 'Użytkownik niezalogowany'], 401);
        }

        // Dodaj user_id do danych recenzji
        $reviewData = $request->all();
       // $reviewData['user_id'] = auth()->id(); // Załóżmy, że korzystasz z autentykacji, możesz dostosować to do swojej logiki
        $reviewData['user_id'] = $userId;
        $fuelStation->reviews()->create($reviewData);

        return response()->json(['message' => 'Recenzja została dodana'], 201);
    }

    public function getAverageRating(FuelStation $fuelStation)
    {
        $averageRating = $fuelStation->reviews()->avg('rating');

        return response()->json(['averageRating' => $averageRating]);
    }
}

