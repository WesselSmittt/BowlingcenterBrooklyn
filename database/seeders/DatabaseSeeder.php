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
        $this->call(Pakketoptie::class);
        $this->call(Persoon::class);
        $this->call(Reserveringstatus::class);
        $this->call(Reservering::class);
        $this->call(ScoreTableSeeder::class);
        $this->call(GameTableSeeder::class);
        $this->call(PlayerTableSeeder::class);
        $this->call(ReservationTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TariffTableSeeder::class);
    }
}