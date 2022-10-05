<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'name' => $this->faker->name,
                'standard' => $this->faker->numberBetween(1000 ,5000),
                'premium' => $this->faker->numberBetween(6000 ,10000),
                'gold' => $this->faker->numberBetween(11000 ,15000),
                'description' => $this->faker->text,
                'product_image' => "product-1642858986100.png",
                'category_id' => Category::inRandomOrder()->take(1)->first()->id,
                 'brand_id' => Brand::inRandomOrder()->take(1)->first()->id,
        ];
    }
}
