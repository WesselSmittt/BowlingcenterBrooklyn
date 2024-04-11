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
                'PersoonId' => 1,
                'OpeningstijdId' => 2,
                'TariefId' => 1,
                'BaanId' => 8,
                'PakketOptieId' => 1,
                'ReserveringStatusId' => 1,
                'Reserveringsummer' => '2022122000001',
                'Datum' => '2022-12-20',
                'AantalUren' => 1,
                'BeginTijd' => '15:00',
                'EindTijd' => '16:00',
                'AantalVolwassen' => 4,
                'AantalKinderen' => 2,
            ],
            [
                'PersoonId' => 2,
                'OpeningstijdId' => 2,
                'TariefId' => 1,
                'BaanId' => 2,
                'PakketOptieId' => 3,
                'ReserveringStatusId' => 1,
                'Reserveringsummer' => '2022122000002',
                'Datum' => '2022-12-20',
                'AantalUren' => 1,
                'BeginTijd' => '17:00',
                'EindTijd' => '18:00',
                'AantalVolwassen' => 4,
                'AantalKinderen' => 0,
            ],
            [
                'PersoonId' => 3,
                'OpeningstijdId' => 7,
                'TariefId' => 2,
                'BaanId' => 3,
                'PakketOptieId' => 1,
                'ReserveringStatusId' => 1,
                'Reserveringsummer' => '2022122400003',
                'Datum' => '2022-12-24',
                'AantalUren' => 2,
                'BeginTijd' => '16:00',
                'EindTijd' => '18:00',
                'AantalVolwassen' => 4,
                'AantalKinderen' => 0,
            ],
            [
                'PersoonId' => 1,
                'OpeningstijdId' => 2,
                'TariefId' => 1,
                'BaanId' => 6,
                'PakketOptieId' => 0,
                'ReserveringStatusId' => 1,
                'Reserveringsummer' => '2022122700004',
                'Datum' => '2022-12-27',
                'AantalUren' => 2,
                'BeginTijd' => '17:00',
                'EindTijd' => '19:00',
                'AantalVolwassen' => 2,
                'AantalKinderen' => 0,
            ],
            [
                'PersoonId' => 4,
                'OpeningstijdId' => 3,
                'TariefId' => 1,
                'BaanId' => 4,
                'PakketOptieId' => 4,
                'ReserveringStatusId' => 1,
                'Reserveringsummer' => '2022122800005',
                'Datum' => '2022-12-28',
                'AantalUren' => 1,
                'BeginTijd' => '14:00',
                'EindTijd' => '15:00',
                'AantalVolwassen' => 3,
                'AantalKinderen' => 0,
            ],
            [
                'PersoonId' => 5,
                'OpeningstijdId' => 10,
                'TariefId' => 3,
                'BaanId' => 5,
                'PakketOptieId' => 4,
                'ReserveringStatusId' => 1,
                'Reserveringsummer' => '2022122800006',
                'Datum' => '2022-12-28',
                'AantalUren' => 2,
                'BeginTijd' => '19:00',
                'EindTijd' => '21:00',
                'AantalVolwassen' => 2,
                'AantalKinderen' => 0,
            ],
        ]);
    }
}


