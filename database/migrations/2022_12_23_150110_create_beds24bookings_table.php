<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeds24bookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beds24bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('guestFirstName')->nullable();
            $table->string('guestName')->nullable();
            $table->string('bookId')->unique();
            $table->string('unitId')->nullable();
            $table->foreignId('room_id')->nullable();
            $table->date('checkinday')->nullable();
            $table->date('checkoutday')->nullable();
            $table->integer('numAdult')->nullable();
            $table->decimal('invoiceamount',10,2)->nullable();
            $table->decimal('invoiceamount_uzs',10,2)->nullable();
            $table->decimal('commission',10,2)->nullable();
            $table->string('referer')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('company_name')->nullable();
            $table->date('report_number')->nullable();
            $table->foreignId('hotel_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beds24bookings');
    }
}
