<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Uitslag extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('uitslag')->insert([
            [
                'SpelId' => 1,
                'AantalPunten' => 277,
            ],
            [
                'SpelId' => 2,
                'AantalPunten' => 284,
            ],
            [
                'SpelId' => 3,
                'AantalPunten' => 120,
            ],
            [
                'SpelId' => 4,
                'AantalPunten' => 34,
            ],
            [
                'SpelId' => 5,
                'AantalPunten' => 42,
            ],
            [
                'SpelId' => 6,
                'AantalPunten' => 234,
            ],
            [
                'SpelId' => 7,
                'AantalPunten' => 2,
            ],
            [
                'SpelId' => 8,
                'AantalPunten' => 255,
            ]
        ]);
    }
}
