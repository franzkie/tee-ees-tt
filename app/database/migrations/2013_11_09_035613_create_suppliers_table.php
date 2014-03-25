<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblSupplier', function(Blueprint $table) {
			$table->increments('id');
			$table->string('firstName', 20);
			$table->string('lastName', 20);
			$table->string('middleName', 20);
			$table->string('company', 40);
			$table->string('email', 20);
			$table->string('phone', 11);
			$table->string('addressStreet', 30);
			$table->string('addressCity', 30);
			$table->string('addressProvince', 30);
			$table->integer('addressPostalCode');
			$table->decimal('status')->nullable();
			$table->text('notes')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tblSupplier');
	}

}
