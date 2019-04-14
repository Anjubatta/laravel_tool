<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingHeadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_headings', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 150)->unique();
          
        });
		
		DB::table('rating_headings')->insert([
			['name' => 'classroom environment'], 
			['name' => 'Teacher/child interaction'],
			['name' => 'Curriculum'],
			['name' => 'Working with parents']
		]);
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating_headings');
    }
}
