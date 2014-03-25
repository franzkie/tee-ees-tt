<?php

class SuppliersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('suppliers')->truncate();

		$supplierSeed = [
		[
			'firstName'=>'Melvn',
			'lastName'=>'Berdn',
			'middleName'=>'Abenido',
			'company'=>'MelvnBerd Inc',
			'email'=>'venhels@gmail.com',
			'phone'=>'09063330756',
			'addressStreet'=>'Propia st.',
			'addressProvince'=>'Bukidnon',
			'addressPostalCode'=>'8700',
			'notes'=>'This is a default Supplier'
		],
		[
			'firstName'=>'Josh',
			'lastName'=>'Smitty',
			'middleName'=>'Jess',
			'company'=>'Smith Inc',
			'email'=>'Smith@gmail.com',
			'phone'=>'09063330756',
			'addressStreet'=>'Smit st.',
			'addressProvince'=>'Bukidnon',
			'addressPostalCode'=>'8700',
			'notes'=>'This is a default Supplier'
		],
		[
			'firstName'=>'Juan',
			'lastName'=>'Cruz',
			'middleName'=>'Reyes',
			'company'=>'Reyes Inc',
			'email'=>'Reyes@gmail.com',
			'phone'=>'09063330756',
			'addressStreet'=>'Reyes st.',
			'addressProvince'=>'Bukidnon',
			'addressPostalCode'=>'8700',
			'notes'=>'This is a default Supplier'
		],
		[
			'firstName'=>'james',
			'lastName'=>'Blancop',
			'middleName'=>'Goot',
			'company'=>'MelvnBerd Inc',
			'email'=>'Goot@gmail.com',
			'phone'=>'09063330756',
			'addressStreet'=>'Goot st.',
			'addressProvince'=>'Bukidnon',
			'addressPostalCode'=>'8700',
			'notes'=>'This is a default Supplier'
		],
		[
			'firstName'=>'Oscar',
			'lastName'=>'dela hoya',
			'middleName'=>'Boy',
			'company'=>'Golden Boy',
			'email'=>'Golden@gmail.com',
			'phone'=>'09063330756',
			'addressStreet'=>'hoya st.',
			'addressProvince'=>'usa',
			'addressPostalCode'=>'8700',
			'notes'=>'This is a default Supplier'
		],
		[
			'firstName'=>'Franz',
			'lastName'=>'Carerra',
			'middleName'=>'Fojas',
			'company'=>'zkieFooj limited',
			'email'=>'zkie@gmail.com',
			'phone'=>'09063330756',
			'addressStreet'=>'Casisang st.',
			'addressProvince'=>'Bukidnon',
			'addressPostalCode'=>'8700',
			'notes'=>'This is a default Supplier'
					]
];			
		// Uncomment the below to run the seeder
		//DB::table('tblSupplier')->insert($supplierSeed);

		for($x=1;$x<1000;$x++){
			$inserts[] = array(
		    'firstName'=>'user'.$x,
			'lastName'=>'lastname'.$x,
			'middleName'=>'middlename'.$x,
			'company'=>$x.' Company',
			'email'=>$x.'@gmail.com',
			'phone'=>'09063330756',
			'addressStreet'=>$x.' Street',
			'addressCity'=>$x.' City',
			'addressProvince'=>$x.'Province',
			'addressPostalCode'=>$x.$x.$x.$x,
			'notes'=>'Supplier'.$x
		    );

		}
		DB::table('tblSupplier')->insert($inserts);
	}

}
