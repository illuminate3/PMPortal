<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('charts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('project_sponsor');
			$table->string('product_owner');
			$table->string('project_director');
			$table->string('project_manager');
			$table->string('business_analyst');
			$table->string('business_project_manager');
			$table->string('technical_project_manager');
			$table->string('quality_management');
			$table->string('it_security');
			$table->string('enterprise_architecture');
			$table->string('strategic_procurement');
			$table->string('audit');
			$table->string('group_compliance');
			$table->string('project_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('charts');
	}

}
