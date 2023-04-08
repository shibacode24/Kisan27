<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_manager', function (Blueprint $table) {
            $table->id();
            $table->string('Emp_Id');
            $table->string('Designation');
            $table->string('Photo');
            $table->string('Name');
            $table->string('Mobile_Number');
            $table->string('Email');
            $table->string('Age');
            $table->string('Gender');
            $table->string('Address');
            $table->string('Sup_Name');
            $table->string('Sup_Con');
            $table->string('HR_Name');
            $table->string('HR_Email');
            $table->string('HR_Contact Number');
            $table->string('City');
            $table->string('State');
            $table->string('District');
            $table->string('Tahsil');
            $table->string('Region');
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
        Schema::dropIfExists('area_manager');
    }
}
