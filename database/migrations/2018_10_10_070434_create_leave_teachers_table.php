<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves_teachers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('leave_name_id')->unsigned();
			$table->integer('leave_type_id')->unsigned();
			
			$table->integer('teacher_id')->unsigned();
			 $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
			 
			$table->string('leave_unit', 100);
			$table->date('from_date', 100)->nullable();
			$table->string('from_time', 100)->nullable();
			$table->date('to_date', 100)->nullable();
			$table->string('to_time', 100)->nullable();
			$table->text('reason')->nullable();
			$table->enum('status', ['pending', 'approve', 'decline']); 
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
        Schema::dropIfExists('leaves_teachers');
    }
}
