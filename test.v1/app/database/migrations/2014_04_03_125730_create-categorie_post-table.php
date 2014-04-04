<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriePostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categorie_post', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->integer('categorie_id')->unsigned();
		});

		Schema::table('categorie_post', function(Blueprint $table)
		{
			$table->foreign('post_id')->references('id')->on('posts');
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
		Schema::drop('categorie_post');
	}

}
