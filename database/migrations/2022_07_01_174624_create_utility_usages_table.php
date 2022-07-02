<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilityUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utility_usages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('utility_id')->nullable();
            $table->date('usage_date');
            $table->integer('meter_latest');
            $table->integer('meter_previous');
            $table->integer('meter_difference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utility_usages');
    }
}