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
        Schema::create('fosterings', function (Blueprint $table) {
            $table->id();
            $table->string('person_in_charge');
            $table->string('phone_number');
            $table->string('address');
            $table->string('observations')->nullable();
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('city_id');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('fosterings');
    }
};
