<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_person', function (Blueprint $table) {
            $table->id();
            $table->string('Select_Role');
            $table->string('Emp_Id');
            $table->string('image');
            $table->string('Name');
            $table->string('Mobile_Number');
            $table->string('Email');
            $table->string('Address');
            $table->string('ASM_Name');
            $table->string('SM_Contact_No');
            $table->string('HR_Name');
            $table->string('HR_Email');
            $table->string('HR_Contact Number');
            $table->string('City');
            $table->string('District');
            $table->string('Tahsil');
            $table->string('Region');
            $table->string('State');
            $table->string('Location');
            $table->string('Username');
            $table->string('Password');
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
        Schema::dropIfExists('sales_person');
    }
}
