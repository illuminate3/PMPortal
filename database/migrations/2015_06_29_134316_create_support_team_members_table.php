<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportTeamMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('support_team_members', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('project_id')->unsigned()->index();
			$table->string('name');
			$table->string('role');
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
		Schema::drop('support_team_members');
	}

}
