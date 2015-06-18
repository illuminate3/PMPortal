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
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('title');
			$table->string('status');
			$table->text('rationale');
			$table->string('color');
			$table->date('target_date');
			$table->timestamp('last_updated');
			$table->timestamps();
			$table->string('software');
		    $table->string('hardware');
		    $table->integer('target_mandays')->unsigned();
		    $table->integer('actual_mandays')->unsigned();

			$table->foreign('user_id')
				  ->references('id')
				  ->on('users');
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
