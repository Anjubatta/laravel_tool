<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailylogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailylogs', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
			$table->integer('added_by')->unsigned();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade'); 			
			$table->date('date')->nullable();
			$table->string('log_entry_by', 200)->nullable();
			$table->string('opened_by', 200)->nullable();
			$table->string('timein', 5)->nullable();
			$table->text('daily_log')->nullable();
			$table->string('special_incident', 255)->nullable();
			$table->string('action_taken', 255)->nullable();
			$table->string('time_parent_informed', 255)->nullable();
			$table->string('reported_by', 255)->nullable();
			$table->string('change_menu', 255)->nullable();
			$table->string('childcare_closed_by', 255)->nullable();
			$table->string('timeout', 5)->nullable();
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
        Schema::dropIfExists('dailylogs');
    }
}
