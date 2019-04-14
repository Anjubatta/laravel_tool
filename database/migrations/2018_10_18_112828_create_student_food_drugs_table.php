<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFoodDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_food_drugs', function (Blueprint $table) {
            $table->increments('id');
           
			$table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade'); 
			
			$table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade'); 
			
			
            $table->string('food_allergy', 250)->nullable();
            $table->string('drug_allergy', 250)->nullable();
            $table->string('other_restrictions', 250)->nullable();
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
        Schema::dropIfExists('student_food_drugs');
    }
}
