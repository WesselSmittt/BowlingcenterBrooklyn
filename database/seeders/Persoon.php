<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Persoon extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('persoon')->insert([
            [
                'type_persoon_id' => 1,
                'voornaam' => 'Mazin',
                'tussenvoegsel' => null,
                'achternaam' => 'Jamil',
                'roepnaam' => 'Mazin',
                'is_volwassen' => 1,
            ],
            [
                'type_persoon_id' => 1,
                'voornaam' => 'Arjan',
                'tussenvoegsel' => 'de',
                'achternaam' => 'Ruijter',
                'roepnaam' => 'Arjan',
                'is_volwassen' => 1,
            ],
            [
                'type_persoon_id' => 1,
                'voornaam' => 'Hans',
                'tussenvoegsel' => null,
                'achternaam' => 'Odijk',
                'roepnaam' => 'Hans',
                'is_volwassen' => 1,
            ],
            [
                'type_persoon_id' => 1,
                'voornaam' => 'Dennis',
                'tussenvoegsel' => 'van',
                'achternaam' => 'Wakeren',
                'roepnaam' => 'Dennis',
                'is_volwassen' => 1,
            ],
            [
                'type_persoon_id' => 2,
                'voornaam' => 'Wilco',
                'tussenvoegsel' => 'Van',
                'achternaam' => 'de Grift',
                'roepnaam' => 'Wilco',
                'is_volwassen' => 1,
            ],
            [
                'type_persoon_id' => 3,
                'voornaam' => 'Tom',
                'tussenvoegsel' => null,
                'achternaam' => 'Sanders',
                'roepnaam' => 'Tom',
                'is_volwassen' => 0,
            ],
            [
                'type_persoon_id' => 3,
                'voornaam' => 'Andrew',
                'tussenvoegsel' => null,
                'achternaam' => 'Sanders',
                'roepnaam' => 'Andrew',
                'is_volwassen' => 0,
            ],
            [
                'type_persoon_id' => 3,
                'voornaam' => 'Julian',
                'tussenvoegsel' => null,
                'achternaam' => 'Kaldenheuvel',
                'roepnaam' => 'Julian',
                'is_volwassen' => 1,
            ],
        ]);
    }
}
