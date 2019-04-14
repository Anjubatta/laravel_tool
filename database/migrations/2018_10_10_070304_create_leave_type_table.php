<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves_types', function (Blueprint $table) {
            $table->increments('id');
			$table->enum('type', ['paid', 'unpaid']); 
			$table->integer('total_leave')->nullable(); 
            $table->timestamps();
        });
		
		DB::table('leaves_types')->insert([
			['type' => 'Paid', 'total_leave' => '7'],
            ['type' => "Unpaid", 'total_leave' => null],
		]);
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves_types');
    }
}
