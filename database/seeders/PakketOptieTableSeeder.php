<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PakketOptieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('pakket_optie')->insert([
            ['naam' => 'Snackpakketbasis'],
            ['naam' => 'Snackpakketluxe'],
            ['naam' => 'Kinderpartij'],
            ['naam' => 'Vrijgezellenfeest'],
        ]);
    }
}
