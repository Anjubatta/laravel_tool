<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_medicines', function (Blueprint $table) {
            $table->increments('id');
			
			$table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade'); 
						
			$table->string('datetime', 20)->nullable();      
            $table->string('title', 250)->nullable();
            $table->string('medicine', 250)->nullable();
            $table->string('dosage', 250)->nullable();
            $table->string('manner_of_oral', 250)->nullable();
            $table->string('administrated_by', 250)->nullable();
            $table->string('remarks', 250)->nullable();
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
        Schema::dropIfExists('student_medicines');
    }
}
