<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('leases', function (Blueprint $table) {
            $table->id();
            $table->string('reco_number');
            $table->date('le_date');
            $table->date('st_rental_date');
            $table->enum('type',['new','renew'])->default('new');
            $table->enum('lease_type',['سكني','تجاري']);
            $table->enum('status',['expired','active','received'])->default('active');
            $table->string('place');
            $table->string('docFile');


            $table->date('end_rental_date');
            $table->string('fee')->default('0');
            $table->foreignId('financial_id')->constrained('financial_statements')->cascadeOnDelete();  //one to one
            $table->foreignId('tenant_id')->constrained('tenants')->cascadeOnDelete(); //many to one
            $table->foreignId('unit_id')->constrained('units')->cascadeOnDelete();
            $table->foreignId('commitment_id')->constrained('commitments')->cascadeOnDelete();
            $table->foreignId('realty_id')->constrained('realties')->cascadeOnDelete();
            $table->foreignId('contract_id')->constrained('contracts')->cascadeOnDelete();
            $table->date('next_payment')->nullable();

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
        Schema::dropIfExists('leases');
    }
}
