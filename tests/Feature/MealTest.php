<?php

namespace Tests\Feature;

use App\Models\Meal;
use Tests\TestCase;

class MealTest extends TestCase
{
    /**
     * Assert that request is successful and meal is created
     *
     * @return void
     */
    public function testItCanCreateMeal()
    {
        $response = $this->post(route('create-meal'), ['title' => "French toast", 'category' => 2]);

        // Check that it returns a 200 ok response
        $response->assertStatus(200);

        // Check that meal has actually been added
        $this->assertInstanceOf(Meal::class, $response->getOriginalContent()['data']);
    }
}
