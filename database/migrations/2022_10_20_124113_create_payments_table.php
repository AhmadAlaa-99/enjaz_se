<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
          //  $table->enum('payment_method',['cash','visa','bank']);
           // $table->string('account_number');
            $table->foreignId('lease_id')->constrained('leases')->cascadeOnDelete();
            $table->date('release_date');
            $table->date('due_date');
            $table->string('total');
            //$table->string('refrenceNo');
            $table->string('paid')->default('0');
            $table->string('remain');
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
        Schema::dropIfExists('payments');
    }
}
