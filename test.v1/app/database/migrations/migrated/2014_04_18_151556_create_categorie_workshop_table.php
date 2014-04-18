<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorieWorkshopTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categorie_workshop', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('categorie_id')->unsigned();
			$table->integer('workshop_id')->unsigned();
		});

		Schema::table('categorie_workshop', function(Blueprint $table)
		{
			$table->foreign('categorie_id')->references('id')->on('categories');
			$table->foreign('workshop_id')->references('id')->on('workshops');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categorie_workshop');
	}

}
