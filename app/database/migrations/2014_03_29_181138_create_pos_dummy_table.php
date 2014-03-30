<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreatePosDummyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	
	public function up()
	{
		Schema::create('tblPosDummy', function(Blueprint $table) {
			$table->increments('id');
			$table->string('code',11);
			$table->string('category',40);
			$table->string('name',80);
			$table->decimal('price',11,2);
			$table->integer('qty');
			$table->text('description');
			$table->integer('expiry');
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
		Schema::drop('tblPosDummy');
	}

}