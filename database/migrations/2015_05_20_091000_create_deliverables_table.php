<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliverablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deliverables', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('project_id')->unsigned();
			$table->boolean('submitted');
			$table->string('deliverable');
			$table->string('required');
			$table->string('incharge');
			$table->text('condition');
			$table->timestamps();

			$table->foreign('project_id')
				  ->references('id')
				  ->on('projects')
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
		Schema::drop('deliverables');
	}

}
