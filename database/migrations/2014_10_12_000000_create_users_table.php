<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
			
			$table->integer('roles_id')->unsigned();
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade');
			
			$table->string('fname', 100);
            $table->string('lname', 100)->nullable();
            $table->string('email', 100)->unique();
			
            $table->string('password')->nullable();
            $table->string('verify')->nullable();
			$table->string('image')->nullable();
			$table->integer('active')->default(0);
			
            $table->rememberToken();
            $table->timestamps();
        });
		
		DB::table('users')->insert([
			'roles_id' => '1',
			'fname' => 'Super',
			'lname' => 'Admin',
			'email' => 'admin@gmail.com',
			'password' => Hash::make('123456'),
            'image' => 'avatar.png',
            'active' => 1,
		]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
