<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Reservering extends Seeder
{
    /**
     * Run the database seeds.
     */
  
    public function run()
    {
        DB::table('reserveringen')->insert([
            ['id' => 1, 'persoon_id' => 1, 'openingstijd_id' => 2, 'tarief_id' => 1, 'baan_id' => 8, 'pakket_optie_id' => 1, 'reservering_status_id' => 1, 'reserveringsnummer' => '2022122000001', 'datum' => '2022-12-20', 'aantal_uren' => 1, 'begintijd' => '15:00', 'eindtijd' => '16:00', 'aantal_volwassenen' => 4, 'aantal_kinderen' => 2],
            ['id' => 2, 'persoon_id' => 2, 'openingstijd_id' => 2, 'tarief_id' => 1, 'baan_id' => 2, 'pakket_optie_id' => 3, 'reservering_status_id' => 1, 'reserveringsnummer' => '2022122000002', 'datum' => '2022-12-20', 'aantal_uren' => 1, 'begintijd' => '17:00', 'eindtijd' => '18:00', 'aantal_volwassenen' => 4, 'aantal_kinderen' => null],
            ['id' => 3, 'persoon_id' => 3, 'openingstijd_id' => 7, 'tarief_id' => 2, 'baan_id' => 3, 'pakket_optie_id' => 1, 'reservering_status_id' => 1, 'reserveringsnummer' => '2022122000003', 'datum' => '2022-12-24', 'aantal_uren' => 2, 'begintijd' => '16:00', 'eindtijd' => '18:00', 'aantal_volwassenen' => 4, 'aantal_kinderen' => null],
            ['id' => 4, 'persoon_id' => 1, 'openingstijd_id' => 2, 'tarief_id' => 1, 'baan_id' => 6, 'pakket_optie_id' => null, 'reservering_status_id' => 1, 'reserveringsnummer' => '2022122000004', 'datum' => '2022-12-27', 'aantal_uren' => 2, 'begintijd' => '17:00', 'eindtijd' => '19:00', 'aantal_volwassenen' => 2, 'aantal_kinderen' => null],
            ['id' => 5, 'persoon_id' => 4, 'openingstijd_id' => 3, 'tarief_id' => 1, 'baan_id' => 4, 'pakket_optie_id' => 4, 'reservering_status_id' => 1, 'reserveringsnummer' => '2022122000005', 'datum' => '2022-12-28', 'aantal_uren' => 1, 'begintijd' => '14:00', 'eindtijd' => '15:00', 'aantal_volwassenen' => 3, 'aantal_kinderen' => null],
        ]);
    }

}
