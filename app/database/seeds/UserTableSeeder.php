<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('suppliers')->truncate();



		$insert = [
			[
			'username' => 'admin', 
			'email' => 'admin@gmail.com',
			'password'=>'$2y$10$YZLqr35ZBtIFNSac5I6rOeE95NSptXb0Vx7WhA12mimXjtc.hAx.e',
			'confirmation_code'=>'da96ae0fc5ffe3c5a756c4fba2d4b678',
			'userType'=>'superAdmin',
			'confirmed'=>'1'
			]

		];



		// Uncomment the below to run the seeder
		DB::table('users')->insert($insert);
	}

}
