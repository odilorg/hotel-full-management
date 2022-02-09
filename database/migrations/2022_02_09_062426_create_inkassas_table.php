<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInkassasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inkassas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date_inkassa');
            $table->decimal('amount_inkassa',10,2);
            $table->string('ytt_ok');
            $table->decimal('total_amount', 10,2);
            $table->foreignId('user_id');
            $table->foreignId('report_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inkassas');
    }
}
