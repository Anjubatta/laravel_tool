<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('added_id')->unsigned();
            $table->foreign('added_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('companies_id')->unsigned();
            $table->foreign('companies_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('surname', 50);
            $table->string('first_name', 50);
            $table->string('middle_name', 50);
            $table->integer('student_no')->unique();
            $table->integer('contact_no');
            $table->enum('gender',['female','male']);
            $table->enum('active', ['0', '1']);
            $table->text('address');
            $table->date('dob');
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
        Schema::dropIfExists('students');
    }
}
