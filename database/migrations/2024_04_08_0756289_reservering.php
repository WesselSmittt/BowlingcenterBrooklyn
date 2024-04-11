<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reserveringen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persoon_id')->constrained('personen');
            $table->integer('openingstijd_id');
            $table->integer('tarief_id');
            $table->integer('baan_id');
            $table->foreignId('pakket_optie_id')->nullable()->constrained('pakket_opties');
            $table->foreignId('reservering_status_id')->constrained('reservering_statussen');
            $table->string('reserveringsnummer');
            $table->date('datum');
            $table->integer('aantal_uren');
            $table->time('begintijd');
            $table->time('eindtijd');
            $table->integer('aantal_volwassenen');
            $table->integer('aantal_kinderen')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserveringen');
    }
};
