<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
			
			$table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
			
			$table->string('date',20)->nullable();
			$table->string('timein',20)->nullable();
			$table->string('timeout',20)->nullable();
			$table->string('temp1',10)->nullable();
			$table->string('temp2',10)->nullable();
			$table->string('temp3',10)->nullable();
			$table->enum('status',['Absent','IN','OUT']);
			$table->enum('session',['Morning', 'Evening']);
            $table->timestamps();
			$table->integer('send_by')->nullable();
			$table->integer('pick_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
