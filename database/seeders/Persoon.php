<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Persoon extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personen')->insert([
            ['id' => 1, 'typepersoonid' => 1, 'voornaam' => 'Mazin', 'tussenvoegsel' => null, 'achternaam' => 'Jamil', 'roepnaam' => 'Mazin', 'IsVolwassen' => 1],
            ['id' => 2, 'typepersoonid' => 1, 'voornaam' => 'Arjan', 'tussenvoegsel' => 'de', 'achternaam' => 'Ruijter', 'roepnaam' => 'Arjan', 'IsVolwassen' => 1],
            ['id' => 3, 'typepersoonid' => 1, 'voornaam' => 'Haans', 'tussenvoegsel' => null, 'achternaam' => 'Odijk', 'roepnaam' => 'Hans', 'IsVolwassen' => 1],
            ['id' => 4, 'typepersoonid' => 1, 'voornaam' => 'Dennis', 'tussenvoegsel' => 'van', 'achternaam' => 'Wakeren', 'roepnaam' => 'Dennis', 'IsVolwassen' => 1],
            ['id' => 5, 'typepersoonid' => 2, 'voornaam' => 'Wilco', 'tussenvoegsel' => 'Van de', 'achternaam' => 'Grift', 'roepnaam' => 'Wilco', 'IsVolwassen' => 1],
            ['id' => 6, 'typepersoonid' => 3, 'voornaam' => 'Tom', 'tussenvoegsel' => null, 'achternaam' => 'Sanders', 'roepnaam' => 'Tom', 'IsVolwassen' => 0],
            ['id' => 7, 'typepersoonid' => 3, 'voornaam' => 'Andrew', 'tussenvoegsel' => null, 'achternaam' => 'Sanders', 'roepnaam' => 'Andrew', 'IsVolwassen' => 0],
            ['id' => 8, 'typepersoonid' => 3, 'voornaam' => 'Julian', 'tussenvoegsel' => null, 'achternaam' => 'Kaldenheuvel', 'roepnaam' => 'Julian', 'IsVolwassen' => 1],
        ]);
    }
}
?>