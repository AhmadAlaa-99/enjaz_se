<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {











        Schema::create('financial_statements', function (Blueprint $table) {
            $table->id();
            $table->string('recurring_rent_payment');
             $table->string('ejar_cost');
             $table->string('tax')->nullable();
            $table->string('tax_ammount')->nullable();
            $table->string('rent_value');
            $table->string('paid');
            $table->string('remain');
            $table->string('num_rental_payments');
            $table->enum('payment_cycle',['monthly','annual','quarterly','midterm']);
            $table->string('notes')->nullable('-');
            $table->string('next_payment')->nullable();
            $table->string('payment_channels');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_statements');
    }
}
