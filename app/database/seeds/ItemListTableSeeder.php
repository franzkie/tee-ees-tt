<?php

class ItemListTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('suppliers')->truncate();



		$insert = [
			[
			'itemName' => 'Paracetamol', 
			'Description' => ' It is commonly used for the relief of headaches and other minor aches and pains',
			'inStockQuantity'=>'100',
			'unitPrice'=>'3.5'
			],
			[
			'itemName' => 'Biogesic', 
			'Description' => 'The most prescribed Headache and Fever brand that\'s Effective and Safe.',
			'inStockQuantity'=>'200',
			'unitPrice'=>'4.5'
			],
			[
			'itemName' => 'Bioflu', 
			'Description' => ' Relief of clogged nose, runny nose, postnasal drip, sneezing, headache, body aches & fever associated w/ common cold',
			'inStockQuantity'=>'50',
			'unitPrice'=>'13.5'
			],
			[
			'itemName' => 'Medicol', 
			'Description' => 'Provides advance relief from intense headache and pain.',
			'inStockQuantity'=>'55',
			'unitPrice'=>'3.5'
			],
			[
			'itemName' => 'Test item no. 1', 
			'Description' => 'default description for test item no. 1.',
			'inStockQuantity'=>'100',
			'unitPrice'=>'60'
			],
			[
			'itemName' => 'Test item no. 2', 
			'Description' => 'default description for test item no. 2.',
			'inStockQuantity'=>'33',
			'unitPrice'=>'10'
			],
			[
			'itemName' => 'Test item no. 3', 
			'Description' => 'default description for test item no. 4.',
			'inStockQuantity'=>'50',
			'unitPrice'=>'160'
			],
			[
			'itemName' => 'Test item no. 4', 
			'Description' => 'default description for test item no. 4.',
			'inStockQuantity'=>'40',
			'unitPrice'=>'160'
			],
			[
			'itemName' => 'Test item no. 5', 
			'Description' => 'default description for test item no. 5.',
			'inStockQuantity'=>'100',
			'unitPrice'=>'60'
			],
			[
			'itemName' => 'Test item no. 6', 
			'Description' => 'default description for test item no. 6.',
			'inStockQuantity'=>'120',
			'unitPrice'=>'560'
			],
			[
			'itemName' => 'Test item no. 7', 
			'Description' => 'default description for test item no. 7.',
			'inStockQuantity'=>'25',
			'unitPrice'=>'120'
			]

		];



		// Uncomment the below to run the seeder
		DB::table('tblItemList')->insert($insert);
	}

}
