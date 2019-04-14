<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_fees', function (Blueprint $table) {
            $table->increments('id');
			
			$table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
			
			$table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');
			
			$table->string('for_month',20)->nullable();
			$table->string('receipt_no',20)->nullable();			
			$table->enum('status',['Unpaid','Paid']);
			$table->string('date',20)->nullable();
			$table->string('c_name',250)->nullable();
			$table->string('c_address',250)->nullable();
			$table->string('amount_received',20)->nullable();
			$table->string('programme_fee',20)->nullable();
			$table->string('other_item',20)->nullable();
			$table->string('gst',20)->nullable();
			$table->string('basic_subsidy',20)->nullable();
			$table->string('aditional_subsidy',20)->nullable();
			$table->string('start_up',20)->nullable();
			$table->string('financial_assistance',20)->nullable();
			$table->string('form_assistance',20)->nullable();
			$table->string('net_amount',20)->nullable();
			$table->string('payment_mode',50)->nullable();
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
        Schema::dropIfExists('student_fees');
    }
}
