<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void         
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('tourgroup_id');
            $table->string('transport_type');
            $table->string('auto_type')->nullable();
            $table->string('car_make')->nullable();
            $table->string('extra_info_transport')->nullable();
            $table->string('pickup_or_dropoff_or_marshrut');
            $table->string('extra_info')->nullable();
            $table->string('pickup_or_dropoff_from');
            $table->string('pickup_or_dropoff_to');
            $table->string('driver_name')->nullable();
            $table->string('driver_tel')->nullable();
            $table->dateTime('pickup_or_dropoff_date_time');
            $table->string('train_name')->nullable();
            $table->string('train_ticket_class')->nullable();
            $table->string('air_ticket_class')->nullable();
            $table->string('transport_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transports');
    }
}
