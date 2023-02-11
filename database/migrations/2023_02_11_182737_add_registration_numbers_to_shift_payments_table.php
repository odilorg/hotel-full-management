<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegistrationNumbersToShiftPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shift_payments', function (Blueprint $table) {
            $table->integer('registration_start');
            $table->integer('registration_end')->nullable()->default(null);
            $table->foreignId('emehmon_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shift_payments', function (Blueprint $table) {
            //
        });
    }
}
