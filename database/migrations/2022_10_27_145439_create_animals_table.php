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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('association_id');
            $table->string('name');
            $table->date('birthday');
            $table->date('entry_date');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('animal_specie_id');
            $table->unsignedBigInteger('breed_id')->nullable();
            $table->unsignedBigInteger('size_id')->nullable();
            $table->float('weight')->nullable();
            $table->boolean('gender')->nullable(); // TRUE => MALE / FALSE => FEMALE
            $table->boolean('neutered')->nullable(); // CASTRADO
            $table->string('color')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('association_id')->references('id')->on('associations');
            $table->foreign('animal_specie_id')->references('id')->on('animal_species');
            $table->foreign('breed_id')->references('id')->on('breeds');
            $table->foreign('size_id')->references('id')->on('animal_sizes');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
};
