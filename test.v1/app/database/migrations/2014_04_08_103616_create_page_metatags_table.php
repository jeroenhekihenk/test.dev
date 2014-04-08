<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageMetatagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page_metatags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('metatag_id')->unsigned();
			$table->integer('page_id')->unsigned();
		});

		Schema::table('page_metatags', function(Blueprint $table)
		{
			$table->foreign('metatag_id')->references('id')->on('metatags');
			$table->foreign('page_id')->references('id')->on('pages');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('page_metatags');
	}


}
