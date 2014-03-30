<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenefeciaryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblBenefeciary', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('benefactorID')->unique();
			$table->string('relation',35);
			$table->string('firstName',35);
			$table->string('middleName',35);
			$table->string('lastName',35);
			$table->string('dateOfBirth',10);
			$table->decimal('share',35);
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
		Schema::drop('tblBenefeciary');
	}

}
