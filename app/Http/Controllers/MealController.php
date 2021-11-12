<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;
use Throwable;

class MealController extends Controller
{
    /**
     * Create new meal
     */
    public function create(Request $request)
    {
        try {
            // Get meal category
            $mealCategory = Category::find($request->category);

            // Create new meal for the category
            $meal = new Meal;
            $meal->title = $request->title;

            // Save meal for category
            $lastInserted = $mealCategory->meals()->save($meal);

            return response()->json(['data' => $lastInserted]);
        } catch (Throwable $th) {
            logger($th);
            return response()->json(['message' => "Oops, there seems to be a problem!"], 500);
        }
    }
}
