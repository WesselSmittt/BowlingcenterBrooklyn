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
        Schema::create('reservering', function (Blueprint $table) {
            $table->id();
            $table->integer('PersoonId')->references('id')->on('persoon');
            $table->integer('OpeningstijdId');
            $table->integer('TariefId');
            $table->integer('BaanId');
            $table->unsignedBigInteger('PakketOptieId');
            $table->unsignedBigInteger('ReserveringStatusId');
            $table->string('Reserveringsnummer');
            $table->date('Datum');
            $table->integer('AantalUren');
            $table->string('BeginTijd');
            $table->string('EindTijd');
            $table->integer('AantalVolwassenen');
            $table->integer('AantalKinderen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservering');
    }
};
