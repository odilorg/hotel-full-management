<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_payments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('payment_description')->nullable();
            $table->decimal('payment_amount_uzs');
            $table->foreignId('user_id');
            $table->foreignId('room_id')->nullable();
            $table->foreignId('hotel_id');
            $table->foreignId('payment_type_id');
            $table->foreignId('shift_id');
            
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shift_payments');
    }
}
