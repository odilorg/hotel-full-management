<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelreservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotelreservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('hotel_city');
            $table->string('hotel_name');
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->string('early_checkin');
            $table->string('late_checkout');
            $table->foreignId('tourgroup_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotelreservations');
    }
}
