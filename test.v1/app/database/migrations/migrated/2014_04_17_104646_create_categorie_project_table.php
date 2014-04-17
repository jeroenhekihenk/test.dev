<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorieProjectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categorie_project', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('categorie_id')->unsigned();
			$table->integer('project_id')->unsigned();
		});

		Schema::table('categorie_project', function(Blueprint $table)
		{
			$table->foreign('categorie_id')->references('id')->on('categories');
			$table->foreign('project_id')->references('id')->on('projects');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categorie_project');
	}

}
