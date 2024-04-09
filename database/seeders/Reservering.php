<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Reservering extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('reservering')->insert([
            [
                'persoon_id' => 1,
                'openingstijd_id' => 2,
                'tarief_id' => 1,
                'baan_id' => 8,
                'pakket_optie_id' => 1,
                'reservering_status_id' => 1,
                'reserveringsnummer' => '2022122000001',
                'datum' => '2022-12-20',
                'aantal_uren' => 1,
                'begin_tijd' => '15:00',
                'eind_tijd' => '16:00',
                'aantal_volwassen' => 4,
                'aantal_kinderen' => 2,
            ],
            [
                'persoon_id' => 2,
                'openingstijd_id' => 2,
                'tarief_id' => 1,
                'baan_id' => 2,
                'pakket_optie_id' => 3,
                'reservering_status_id' => 1,
                'reserveringsnummer' => '2022122000002',
                'datum' => '2022-12-20',
                'aantal_uren' => 1,
                'begin_tijd' => '17:00',
                'eind_tijd' => '18:00',
                'aantal_volwassen' => 4,
                'aantal_kinderen' => null,
            ],
            [
                'persoon_id' => 3,
                'openingstijd_id' => 7,
                'tarief_id' => 2,
                'baan_id' => 3,
                'pakket_optie_id' => 1,
                'reservering_status_id' => 1,
                'reserveringsnummer' => '2022122400003',
                'datum' => '2022-12-24',
                'aantal_uren' => 2,
                'begin_tijd' => '16:00',
                'eind_tijd' => '18:00',
                'aantal_volwassen' => 4,
                'aantal_kinderen' => null,
            ],
            [
                'persoon_id' => 1,
                'openingstijd_id' => 2,
                'tarief_id' => 1,
                'baan_id' => 6,
                'pakket_optie_id' => null,
                'reservering_status_id' => 1,
                'reserveringsnummer' => '2022122700004',
                'datum' => '2022-12-27',
                'aantal_uren' => 2,
                'begin_tijd' => '17:00',
                'eind_tijd' => '19:00',
                'aantal_volwassen' => 2,
                'aantal_kinderen' => null,
            ],
            [
                'persoon_id' => 4,
                'openingstijd_id' => 3,
                'tarief_id' => 1,
                'baan_id' => 4,
                'pakket_optie_id' => 4,
                'reservering_status_id' => 1,
                'reserveringsnummer' => '2022122800005',
                'datum' => '2022-12-28',
                'aantal_uren' => 1,
                'begin_tijd' => '14:00',
                'eind_tijd' => '15:00',
                'aantal_volwassen' => 3,
                'aantal_kinderen' => null,
            ],
            [
                'persoon_id' => 5,
                'openingstijd_id' => 10,
                'tarief_id' => 3,
                'baan_id' => 5,
                'pakket_optie_id' => 4,
                'reservering_status_id' => 1,
                'reserveringsnummer' => '2022122800006',
                'datum' => '2022-12-28',
                'aantal_uren' => 2,
                'begin_tijd' => '19:00',
                'eind_tijd' => '21:00',
                'aantal_volwassen' => 2,
                'aantal_kinderen' => null,
            ],
        ]);
    }
}


