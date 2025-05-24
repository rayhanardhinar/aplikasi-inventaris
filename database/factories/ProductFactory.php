<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = Category::inRandomOrder()->first()->id;

        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->word(),
            'quantity' => $this->faker->randomNumber(2),
            'price' => $this->faker->randomNumber(5),
            'category_id' => $id,
        ];
    }
}
