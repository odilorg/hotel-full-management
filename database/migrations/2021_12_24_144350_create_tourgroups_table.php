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
            $table->string('tourgroup_pax');
            $table->date('tourgroup_ci');
            $table->date('tourgroup_co');
            $table->string('tourgroup_status');
            $table->foreignId('user_id')->nullable();

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
