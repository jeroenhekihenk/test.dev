<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->integer('comment_id')->unsigned();
		});

		Schema::table('post_comments', function(Blueprint $table)
		{
			$table->foreign('post_id')->references('id')->on('posts');
			$table->foreign('comment_id')->references('id')->on('comments');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('post_comments');
	}

}
