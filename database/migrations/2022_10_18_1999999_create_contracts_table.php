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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('realty_id')->constrained('realties')->cascadeOnDelete();
            $table->string('contactNo');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('rent_value');
            $table->string('contract_file');
            $table->enum('status',['جديد','مجدد','منتهي'])->default('جديد');
            $table->enum('type',['سكني','تجاري']);
            $table->enum('type_s',['جاري','منتهي'])->default('جاري');
            $table->string('ejar_cost');
             $table->string('tax_amount')->nullable();
            $table->string('tax')->nullable();
            $table->string('note')->nullable('-');
            $table->string('remain');
            $table->string('paid')->default('0');
            $table->string('fee')->default('0');
            $table->date('next_payment')->nullable();
             $table->string('ensollments_total');
            $table->string('ensollments_paid')->default('0');



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
        Schema::dropIfExists('contracts');
    }
};
