<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves_names', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name',100);
            $table->timestamps();
        });
		
		DB::table('leaves_names')->insert([
			['name' => 'Casual'],
            ['name' => "Sick"],
            ['name' => "Maternity"],
            ['name' => "Quarantine"],
		]);
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves_names');
    }
}
