<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function it_can_retrieve_a_category_by_id()
    {
        // Create a category in the database
        $category = Category::factory()->create();

        // Send a GET request to the route that retrieves a category by ID
        $response = $this->get("/categories/{$category->id}");

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains the category data
        $response->assertJson([
            'category' => [
                'id' => $category->id,
            ]
        ]);
    }
    public function it_can_create_a_category()
    {
        // Simulate data for creating a category
        $categoryData = [
            'name' => 'New Category',
            // Include other category attributes as needed
        ];

        // Send a POST request to the route that adds a category
        $response = $this->post('api/add/category', $categoryData);

        // Assert that the response has a successful status code
        $response->assertStatus(201);

        // Assert that the category was added to the database
        $this->assertDatabaseHas('categories', $categoryData);
    }
}
