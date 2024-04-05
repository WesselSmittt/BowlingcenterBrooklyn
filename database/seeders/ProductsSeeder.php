<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all category ids
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        // Check if there are any categories
        if (empty($categoryIds)) {
            // If not, throw an exception
            throw new \Exception('No categories found. Please seed the categories table first.');
        }

        foreach (range(1,10) as $index) {
            DB::table('products')->insert([
                'product_name' => $faker->word,
                'price' => $faker->randomFloat(2, 1, 100),
                'category_id' => $faker->randomElement($categoryIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}