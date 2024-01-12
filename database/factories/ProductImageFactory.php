<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'file_path' => 'storage/uploads',
            'file_name' => $this->faker->image(public_path('storage/uploads'), 640, 480, null, false),
            'mime_type' => 'image/jpeg',
            'size' => $this->faker->numberBetween(10000, 500000),
        ];
    }
}
