<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetatagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metatags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('metatitle', 80); 
			$table->string('metadescription', 160);
			$table->string('ogtitle', 80);
			$table->string('ogdescription', 300);
			$table->string('ogsitename', 255);
			$table->string('ogurl');
			$table->string('ogimage', 64);
			$table->string('ogtype');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('metatags');
	}

}
