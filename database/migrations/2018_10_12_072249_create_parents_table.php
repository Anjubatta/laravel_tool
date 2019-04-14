<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
		* Run the migrations.
     *
     * @return void
     */
	 
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('companies_id');
            $table->integer('users_id');
            $table->string('sur_name');
            $table->string('first_name');
            $table->string('age')->nullable();
            $table->string('middle_name');
            $table->enum('gender', ['female', 'male']);
            $table->string('contact_no');
            $table->string('relation');
            $table->integer('parent_id')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            
            $table->string('image')->nullable();
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
        Schema::dropIfExists('parents');
		}
}
