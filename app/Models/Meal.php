<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    /**
     * Get all of the categoriess for the meal.
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
