<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInventoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblinventory', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('itemId');
			$table->enum('status', array('active','inactive'))->default(null)->nullable();
			$table->float('sellingPrice');
			$table->float('quantity');
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
		Schema::drop('tblinventory');
	}

}
