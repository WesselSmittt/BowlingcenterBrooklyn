<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TariffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tariffs')->updateOrInsert(
            ['id' => 1, 'product_price' => 24],
            ['id' => 2, 'product_price' => 28],
            ['id' => 3, 'product_price' => 33.5]
        );
    }
}
