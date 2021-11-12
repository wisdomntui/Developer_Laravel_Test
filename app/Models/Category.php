<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Get all of the meals that have this category.
     */
    public function meals()
    {
        return $this->morphedByMany(Meal::class, 'categorizable');
    }

    /**
     * Get all of the blogs that have this category.
     */
    public function blogs()
    {
        return $this->morphedByMany(Blog::class, 'categorizable');
    }
}
