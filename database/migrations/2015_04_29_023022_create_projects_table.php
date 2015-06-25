<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			
			$table->increments('id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->nullable();
			$table->string('pm');
			$table->string('cac');
			$table->string('title');
			$table->string('status');
			$table->double('percent')->unsigned();
			$table->text('rationale');
			$table->string('software');
		    $table->string('hardware');
			$table->string('color');
			$table->date('target_start');
			$table->date('target_end');
			$table->date('actual_start');
			$table->date('actual_end');
			$table->double('budget')->unsigned();
			$table->double('utilization')->unsigned();
			$table->string('importance');
			$table->integer('target_mandays')->unsigned();
		    $table->integer('actual_mandays')->unsigned();
			$table->string('applicability');
			$table->string('confidentiality');

			$table->timestamp('last_updated');
			$table->timestamps();
			
		    
/*
			$table->foreign('user_id')
				  ->references('id')
				  ->on('users'); */
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
