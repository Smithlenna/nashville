<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_registration')->nullable();
            $table->string('vat')->nullable();
            $table->string('contact_person');
            $table->string('company_address');
            $table->longText('map');
            $table->string('zip_code');
            $table->string('primary_number');
            $table->string('secondary_number')->nullable();
            $table->string('email');
            $table->string('website');
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
        Schema::dropIfExists('company_details');
    }
}
