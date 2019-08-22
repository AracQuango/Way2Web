<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxiRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxi_rides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("pickup_zip");
            $table->string("pickup_street_number");
            $table->string("dropoff_zip");
            $table->string("dropoff_street_number");
            $table->bigInteger('resident_id')->unsigned();
            $table->foreign('resident_id')->references('id')->on('residents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxi_rides');
    }
}
