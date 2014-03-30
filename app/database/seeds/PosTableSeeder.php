<?php

class PosTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('customers')->truncate();

		$cat = array('tablet','capsule','otherCategory');
		$name = array('Alaxan','Tuseran','Paracetamol');
		$price = array('100.00','45.00','20.00');
		$qty = array('100','150','200');
		$description = array('first description','second description','third description');
		$exp = array('1395748873','1395479225','1395499230');

		for($x = 1;$x<26;$x++) {

		$r = rand(0,2);

		$pos =
			array('code' => (10+$x)+(($exp[$r]+0)%10000),
				  'category' => $cat[$r],
				  'name' => $name[$r],
				  'price' => $price[rand(0,2)],
				  'qty' => $qty[rand(0,2)],
				  'description' => $description[$r],
				  'expiry' => $exp[rand(0,2)],
				  'created_at' => $exp[$r]
				  );
		DB::table('tblposdummy')->insert($pos);
		}

		// Uncomment the below to run the seeder
		// DB::table('customers')->insert($customers);
	}

}
