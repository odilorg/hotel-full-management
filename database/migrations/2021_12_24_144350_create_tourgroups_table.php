<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourgroups', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tourgroup_name');
            $table->string('tourgroup_country');
            $table->string('tourgroup_status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourgroups');
    }
}