<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateRatingOptionsTable extends Migration
	{
		/**
			* Run the migrations.
			*
			* @return void
		*/
		public function up()
		{
			Schema::create('rating_options', function (Blueprint $table) {
				$table->increments('id');
				
				$table->integer('rating_headings_id')->unsigned();
				$table->foreign('rating_headings_id')->references('id')->on('rating_headings')->onDelete('cascade');
				
				$table->string('name', 100)->unique();
			});
			DB::table('rating_options')->insert([		
			['rating_headings_id' => 1,'name' => 'Keeps Classroom Environment Clean and Oderly'],
			['rating_headings_id' => 1,'name' => 'Classroom Environmnet Welcoming and Attractive'],
			['rating_headings_id' => 1,'name' => 'Bulletin Boards Creative and Displays Children`s Art'],
			['rating_headings_id' => 1,'name' => 'Children are Engaged in a variety of Activities'],
			['rating_headings_id' => 1,'name' => 'Efficient Classroom Management'],
			['rating_headings_id' => 1,'name' => 'Classroom Prepared and Ready for Children`s Arrival'],
			['rating_headings_id' => 2,'name' => 'Shows Respect to All Children'],
			['rating_headings_id' => 2,'name' => 'Interacts and Sits with Children'],
			['rating_headings_id' => 2,'name' => 'Involves Children in Conversation'],
			['rating_headings_id' => 2,'name' => 'Works Well with Difficult Behaviour'],
			['rating_headings_id' => 2,'name' => 'Provides and Implements Appropriate Transitions'],
			['rating_headings_id' => 2,'name' => 'Appropriate Discipline Equally'],
			['rating_headings_id' => 2,'name' => 'Keeps Adult Conversation to A Minimum'],
			['rating_headings_id' => 3,'name' => 'Knowledgeable of Age_Group Goals and Expected Student Outcomes'],
			['rating_headings_id' => 3,'name' => 'turns in Lessons Plans, Reflections and Newsletters On time'],
			['rating_headings_id' => 3,'name' => 'Dsiplays "Current Issues"'],
			['rating_headings_id' => 3,'name' => 'Provides  a Variety of Manipulation Activities/Centers'],
			['rating_headings_id' => 3,'name' => 'Balance of Teacher and Child Directed Activities'],
			['rating_headings_id' => 4,'name' => 'Communicates Professionally with Parents'],
			['rating_headings_id' => 4,'name' => 'Makes Parents Feel Welcome in Classroom'],
			['rating_headings_id' => 4,'name' => 'Provides Opportunity for Parents to Participate'],
			['rating_headings_id' => 4,'name' => 'Communicates Effectivly with Parents'],
			['rating_headings_id' => 4,'name' => 'Respects Parents']

			]);
			
		}
		
		/**
			* Reverse the migrations.
			*
			* @return void
		*/
		public function down()
		{
        Schema::dropIfExists('rating_options');
		}
	}
