<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('super_id')->unsigned();

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('name', 150);
            $table->integer('id_no');
            $table->text('information');
            $table->text('address');

            $table->string('image', 100);
            $table->string('subscription_detail', 50);
            $table->string('subscription_payment', 50);
            $table->string('subscription_period', 50);
            $table->date('subscription_expired');
            $table->enum('auto_renew', ['0', '1'])->default('0');
			$table->integer('annual_leave')->nullable();
			$table->integer('expected_attendance')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
