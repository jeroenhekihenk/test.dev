<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagWorkshopTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_workshop', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tag_id')->unsigned();
			$table->integer('workshop_id')->unsigned();
		});

		Schema::table('tag_workshop', function(Blueprint $table)
		{
			$table->foreign('tag_id')->references('id')->on('tags');
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
		Schema::drop('tag_workshop');
	}

}
