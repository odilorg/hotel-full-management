<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('fathers_name');
            $table->integer('inn')->nullable();
            $table->integer('pinfl')->nullable();
            $table->string('position');
            $table->string('passport_copy_image')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('cellphone_1')->nullable();
            $table->string('cellphone_2')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
