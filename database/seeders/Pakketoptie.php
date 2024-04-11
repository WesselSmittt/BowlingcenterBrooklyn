<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Pakketoptie extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pakket_opties')->insert([
            ['id' => 1, 'naam' => 'Snackpakketbasis'],
            ['id' => 2, 'naam' => 'Snackpakketluxe'],
            ['id' => 3, 'naam' => 'Kinderpartij'],
            ['id' => 4, 'naam' => 'Vrijgezellenfeest'],
        ]);
    }
}
