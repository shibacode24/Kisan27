<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Ramsey\Uuid\v1;

class CreateEmpRegTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_reg', function (Blueprint $table) {
            $table->id();
            $table->string('Emp_Id');
            $table->string('Name');
            $table->string('Mobile_Number');
            $table->string('Email_Id');
            $table->string('Address');
            $table->string('City');
            $table->string('Religion');
            $table->string('State');
            $table->string('Pincode');
            $table->string('District');
            $table->string('Tahsil'); 
            $table->string('User_Id');
            $table->string('Password');
            $table->string('Role');
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
        Schema::dropIfExists('emp_reg');
    }
}
