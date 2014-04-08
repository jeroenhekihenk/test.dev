<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorieMetatagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categorie_metatags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('metatag_id')->unsigned();
			$table->integer('categorie_id')->unsigned();
		});

		Schema::table('categorie_metatags', function(Blueprint $table)
		{
			$table->foreign('metatag_id')->references('id')->on('metatags');
			$table->foreign('categorie_id')->references('id')->on('categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categorie_metatags');
	}


}
