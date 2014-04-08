<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagMetatagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_metatags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('metatag_id')->unsigned();
			$table->integer('tag_id')->unsigned();
		});

		Schema::table('tag_metatags', function(Blueprint $table)
		{
			$table->foreign('metatag_id')->references('id')->on('metatags');
			$table->foreign('tag_id')->references('id')->on('tags');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tag_metatags');
	}


}
