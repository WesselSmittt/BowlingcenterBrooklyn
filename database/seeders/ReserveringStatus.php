<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ReserveringStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservering_statussen')->insert([
            ['id' => 1, 'naam' => 'Bevestigd'],
            ['id' => 2, 'naam' => 'Geannuleerd'],
            ['id' => 3, 'naam' => 'Inbehandeling'],
        ]);
    }
}
