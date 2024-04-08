<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'persoon_id' => 1,
                'gebruiksnaam' => 'm.jamil@gmail.com',
                'wachtwoord' => '$2y$10$296RMzqzZqWENu9vyh6axed0DkfsuYkbvoI/AXVowCp/DL6zKiF0i',
                'is_ingelogd' => 1,
                'ingelogd' => '2209-10-18 13:45:03',
                'uitgelogd' => null,
            ],
            [
                'persoon_id' => 5,
                'gebruiksnaam' => 'w.van.de.grift@gmail.com',
                'wachtwoord' => '$2y$10$MmF2xYH.woUKV1rGWVKCiuSqRdSQ/qAMO8QCX.mIfAZWv9N68EuK.',
                'is_ingelogd' => 0,
                'ingelogd' => '2209-10-18 17:10:12',
                'uitgelogd' => '2209-10-18 17:20:42',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakket_optie');
    }
};
