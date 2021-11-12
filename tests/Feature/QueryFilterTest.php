<?php

namespace Tests\Feature;

use Tests\TestCase;

class QueryFilterTest extends TestCase
{

    /**
     * Test that the query filter feature works
     */
    public function testItFiltersByTitle()
    {
        $response = $this->post(route('search'), ['title' => "Minima et nobis officiis praesentium eaque."]);
        $response->assertStatus(200);
    }
}
