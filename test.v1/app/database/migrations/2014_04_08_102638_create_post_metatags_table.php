<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostMetatagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_metatags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('metatag_id')->unsigned();
			$table->integer('post_id')->unsigned();
		});

		Schema::table('post_metatags', function(Blueprint $table)
		{
			$table->foreign('metatag_id')->references('id')->on('metatags');
			$table->foreign('post_id')->references('id')->on('posts');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post_metatags');
	}

}
