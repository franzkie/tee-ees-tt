<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('suppliers')->truncate();



		$insert = [
			[
			'username' => 'admin', 
			'email' => 'admin@gmail.com',
			'password'=>'admin',
			'unitPrice'=>'superAdmin',
			'confirmed'=>'1'
			]

		];



		// Uncomment the below to run the seeder
		DB::table('users')->insert($insert);
	}

}
