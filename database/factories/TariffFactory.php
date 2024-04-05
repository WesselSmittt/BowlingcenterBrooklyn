<?php

namespace Database\Factories;

use App\Models\Tariff;
use Illuminate\Database\Eloquent\Factories\Factory;

class TariffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tariff::class;

    /**
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_price' => $this->faker->randomElement([24, 28, 33.50])
        ];
    }
}