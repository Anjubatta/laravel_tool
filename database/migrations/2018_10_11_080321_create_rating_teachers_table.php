<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_teachers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('rating_options_id')->unsigned();
			$table->foreign('rating_options_id')->references('id')->on('rating_options')->onDelete('cascade');          
			$table->integer('teacher_id')->unsigned();
			$table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');         
			$table->integer('rating_by')->unsigned();
			$table->enum('rate',['Excellent','Satisfactory', 'Needs Improvement']);
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
        Schema::dropIfExists('rating_teachers');
    }
}
