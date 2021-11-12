<?php

namespace Tests\Feature;

use Tests\TestCase;

class MorphTest extends TestCase
{
    /**
     * Test that blog categories have been returned
     */
    public function testItCanFetchBlogCategories()
    {
        $blogId = 2;
        $response = $this->get(route('blog-category', $blogId));
        $response->assertStatus(200);
    }
}
