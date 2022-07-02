<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMeterImageToUtilityUsages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utility_usages', function (Blueprint $table) {
            $table->string('meter_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utility_usages', function (Blueprint $table) {
            Schema::dropIfExists('utility_usages');
        });
    }
}
