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
        Schema::create('spel', function (Blueprint $table) {
            $table->id();
            $table->integer('PersoonId')->references('id')->on('persoon');
            $table->integer('ReserveringId')->references('id')->on('reservering');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spel');
    }
};
