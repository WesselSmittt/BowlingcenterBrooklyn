<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->randomFloat(2, 1, 100),
            'product_name' => $this->faker->word,
            'category_id' => Categorie::factory(),
        ];
    }
}