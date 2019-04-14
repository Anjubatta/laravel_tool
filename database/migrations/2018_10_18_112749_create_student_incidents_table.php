<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_incidents', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade'); 
			$table->date('date')->nullable();
            $table->string('time', 20)->nullable();
            $table->string('staff_present', 100)->nullable();
            $table->string('location', 100)->nullable();
            $table->string('equipment', 100)->nullable();
            $table->string('part_of_body', 100)->nullable();
            $table->text('description')->nullable();
            $table->text('how_occur')->nullable();
          
            $table->text('treatment_details')->nullable();
            $table->string('first_aid', 250)->nullable();
            $table->string('corrective_action', 250)->nullable();
            $table->string('name_of_notify', 100)->nullable();
            $table->string('time_notify', 100)->nullable();
            $table->string('notify_by', 100)->nullable();
            $table->enum('type_of_incident', ['incident','accident']);
            $table->enum('treatment_by_dr', ['yes','no']);
            $table->enum('way_of_notify', ['phone','email','other']);
			$table->enum('active', ['0', '1']);
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
        Schema::dropIfExists('student_incidents');
    }
}
