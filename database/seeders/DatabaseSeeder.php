<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ScoreTableSeeder;
use Database\Seeders\GameTableSeeder;
use Database\Seeders\PlayerTableSeeder;
use Database\Seeders\ReservationTableSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\TariffTableSeeder;

class DatabaseSeeder extends Seeder
{
        /**
         * Seed the application's database.
         */
        public function run(): void
        {
                $this->call(TariffsTableSeeder::class);

                // \App\Models\User::factory(10)->create();

                // \App\Models\User::factory()->create([
                //     'name' => 'Test User',
                //     'email' => 'test@example.com',
                // ]);
        }
}
