<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('cargo_arrival_date');
            $table->decimal('total_cargo_weight', 10,2);
            $table->decimal('cargo_total_sum', 10 ,2);
            $table->string('cargo_extra_info')->nullable();
            $table->foreignId('user_id');
            $table->decimal('margin_cargo', 4 ,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
