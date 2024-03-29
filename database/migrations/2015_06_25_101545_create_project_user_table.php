<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('project_user', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->integer('project_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->timestamps();
			

			$table->foreign('project_id')
				  ->references('id')
				  ->on('projects')
				  ->onDelete('cascade');

			$table->foreign('user_id')
				  ->references('id')
				  ->on('users')
				  ->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('project_user');
	}

}
