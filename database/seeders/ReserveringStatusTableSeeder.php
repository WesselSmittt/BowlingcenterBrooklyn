<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReserveringStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('reservering_status')->insert([
            ['naam' => 'Bevestigd'],
            ['naam' => 'Geannuleerd'],
            ['naam' => 'Inbehandelin'],
        ]);
    }
}
