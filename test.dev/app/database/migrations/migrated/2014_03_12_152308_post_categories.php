<?php

use Illuminate\Database\Migrations\Migration;

class PostCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_categories', function($table)
		{
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->integer('categorie_id')->unsigned();
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
		Schema::drop('post_categories');
	}

}
