<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePoContainsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('tblPoContent', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('itemId');
			$table->integer('quantity');
			$table->string('poNumber',11);
			$table->float('itemPrice');
		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tblPoContent');
	}

}