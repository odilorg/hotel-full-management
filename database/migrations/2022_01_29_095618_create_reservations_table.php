<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('guestFirstName')->nullable();
            $table->string('guestName')->nullable();
            $table->string('bookId')->unique();
            $table->string('roomId')->nullable();
            $table->string('unitId')->nullable();
            $table->date('firstNight')->nullable();
            $table->date('lastNight')->nullable();
            $table->integer('numAdult')->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->decimal('commission',10,2)->nullable();
            $table->string('referer')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('company_name')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
