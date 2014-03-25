<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('SuppliersTableSeeder');
		$this->call('CustomersTableSeeder');
		$this->call('EmployeesTableSeeder');
		$this->call('ItemListTableSeeder');
		$this->call('Purchase_ordersTableSeeder');
		$this->call('BillingsTableSeeder');
		$this->call('BillsTableSeeder');
		$this->call('InventoriesTableSeeder');
		$this->call('ItemlistsTableSeeder');
		$this->call('usersTableSeeder');
		
	}

}