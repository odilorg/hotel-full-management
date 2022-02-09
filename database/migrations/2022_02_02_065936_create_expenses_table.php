<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('expense_name');
            $table->foreignId('user_id');
            $table->date('expense_date');
            $table->foreignId('expense_category_id');
            $table->foreignId('payment_type_id');
            $table->foreignId('report_number'); 
            $table->decimal('expense_amount_uzs', 10,2);
            $table->string('expense_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
