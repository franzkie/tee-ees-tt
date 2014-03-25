<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblPurchaseOrder', function(Blueprint $table) {
			$table->increments('id');
			$table->string('supplierId');
			$table->string('orderDate');
			$table->text('message');
			$table->text('shippingAddress');
			$table->text('memo');		
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
		Schema::drop('tblPurchaseOrder');
	}

}
