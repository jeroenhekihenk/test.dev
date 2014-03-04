<?php

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('groups')->delete();
		Sentry::getGroupProvider()->create(array(
			'id' => 1,
			'name' => 'Super Admin',
			'permissions' => array(
				'superadmin' => 1,
			)));

		Sentry::getGroupProvider()->create(array(
			'id' => 2,
			'name' => 'Admin',
			'permissions' => array(
				'admin' => 1,
			)));

		Sentry::getGroupProvider()->create(array(
			'id' => 3,
			'name' => 'Member',
			'permissions' => array(
				'admin'=> 0,
				'superadmin'=> 0,
			)));

		$user = Sentry::findUserById(1);
		$adminGroup = Sentry::findGroupById(1);
		$user->addGroup($adminGroup);
	}

	public function down()
	{
		Schema::drop('groups');
	}

}