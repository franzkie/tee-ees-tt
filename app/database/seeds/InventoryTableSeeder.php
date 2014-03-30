<?php

class InventoryTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('inventories')->truncate();

		$insert = [
			[
			'itemId' => '1', 
			'status' => 'inactive',
			'quantity'=>'100',
			'sellingPrice'=>'4.5',
			'created_at'=> new DateTime
			],
			[
			'itemID' => '2', 
			'status' => 'inactive',
			'quantity'=>'200',
			'sellingPrice'=>'5.5',
			'created_at'=> new DateTime
			],
			[
			'itemID' => '3', 
			'status' => 'inactive',
			'quantity'=>'50',
			'sellingPrice'=>'15.5',
			'created_at'=> new DateTime
			],
			[
			'itemID' => '4', 
			'status' => 'inactive',
			'quantity'=>'55',
			'sellingPrice'=>'5.5',
			'created_at'=> new DateTime
			],
			[
			'itemID' => '5', 
			'status' => 'inactive',
			'quantity'=>'100',
			'sellingPrice'=>'70',
			'created_at'=> new DateTime
			],
			[
			'itemID' => '6', 
			'status' => 'inactive',
			'quantity'=>'33',
			'sellingPrice'=>'13',
			'created_at'=> new DateTime
			],
			[
			'itemID' => '7', 
			'status' => 'inactive',
			'quantity'=>'50',
			'sellingPrice'=>'180',
			'created_at'=> new DateTime
			],
			[
			'itemID' => '8', 
			'status' => 'inactive',
			'quantity'=>'40',
			'sellingPrice'=>'180',
			'created_at'=> new DateTime
			],
			[
			'itemID' => '9', 
			'status' => 'inactive',
			'quantity'=>'100',
			'sellingPrice'=>'60',
			'created_at'=> new DateTime
			],
			[
			'itemID' => '10', 
			'status' => 'inactive',
			'quantity'=>'120',
			'sellingPrice'=>'600',
			'created_at'=> new DateTime
			],
			[
			'itemID' => '11', 
			'status' => 'inactive',
			'quantity'=>'25',
			'sellingPrice'=>'130',
			'created_at'=> new DateTime
			]

		];

		DB::table('tblinventory')->insert($insert);
		// Uncomment the below to run the seeder
		// DB::table('inventories')->insert($inventories);
	}

}
