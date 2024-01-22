<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;

class OrderControllerTest extends TestCase
{
    public function test_user_can_place_order()
    {
        $user = User::first();

        $products = Product::take(3)->get();

        $this->actingAs($user);

        $orderDetails = [];
        foreach ($products as $product) {
            $orderDetails[] = [
                'product_id' => $product->id,
                'quantity' => 2,
            ];
        }

        $response = $this->postJson('/api/orders', [
            'order_details' => $orderDetails,
        ]);

        $response->assertStatus(201)
            ->assertJson(['message' => 'Order placed successfully']);
    }
}
