<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonenTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('personen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_persoon_id');
            $table->integer('typePersoonId');
            $table->string('voornaam');
            $table->string('tussenvoegsel')->nullable();
            $table->string('achternaam');
            $table->string('roepnaam');
            $table->boolean('is_volwassen');
            $table->boolean('isVolwassen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('personen');
    }
}
