<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_sizes', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('animal_specie_id');
            $table->string('name');
            $table->string('code');
            $table->timestamps();

            // $table->foreign('animal_specie_id')->references('id')->on('animal_species');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_sizes');
    }
};
