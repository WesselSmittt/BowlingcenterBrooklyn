<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'category_id' => Categorie::factory(),
        ];
    }
}