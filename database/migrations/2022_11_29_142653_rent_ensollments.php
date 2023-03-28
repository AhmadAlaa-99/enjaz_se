<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('rent_ensollments', function (Blueprint $table) {
            $table->id();
       $table->foreignId('contract_id')->constrained('contracts')->cascadeOnDelete();
       $table->string('installmentNo');
       $table->date('installment_date');
       $table->date('payment_date');
       $table->string('amount');
       $table->string('payment_type');
       $table->string('refrenceNo');
       $table->string('account_number')->nullable();
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
        //
    }
};
