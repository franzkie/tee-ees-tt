<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblItemList', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('itemName',40);
			$table->integer('inStockQuantity');
			$table->float('unitPrice');
			$table->text('description');
		
		});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tblItemList');
	}

}