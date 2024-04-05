<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Score; // Make sure to use the correct model here

class ScoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Score::factory()->count(25)->create();
    }
}