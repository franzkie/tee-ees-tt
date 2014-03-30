<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblMember', function(Blueprint $table) {
			$table->increments('id');
			$table->string('membersID',50)->unique();
			$table->string('memberType',9);
			$table->string('jointIndividual',10);
			$table->integer('subscribedNumberOfShare');
			$table->string('firstName',35);
			$table->string('middleName',35);
			$table->string('lastName',35);
			$table->string('street',35);
			$table->string('brgyDistrict',35);
			$table->string('city',35);
			$table->string('province',35);
			$table->string('dateOfBirth',10);
			$table->string('placeOfBirth',40);
			$table->string('civilStatus',9);
			$table->string('sex',6);
			$table->string('nationality',35);
			$table->string('religion',50);
			$table->string('tin',20);
			$table->string('ctc',20);
			$table->string('ctcOn',10);
			$table->string('ctcAt',35);
			$table->string('contact',50);
			$table->string('spouseFirstName',35);
			$table->string('spouseMiddleName',35);
			$table->string('spouseLastName',35);
			$table->string('spouseDateOfBirth',10);
			$table->string('spouseOccupation',120);
			$table->string('noOfChildren',20);
			$table->integer('EAelementary');
			$table->integer('EAsecondary');
			$table->string('EAtertiary',35);
			$table->string('EAdegree',35);
			$table->string('EAcourse',35);
			$table->string('EAothers',35);
			$table->text('beneficiaries');
			$table->string('sourceOfIncome',120);
			$table->string('nameOfCompany_FI',40);
			$table->string('officeAddress_FI',60);
			$table->string('sSSGSISNo_FI',40);
			$table->string('jobTitle_FI',40);
			$table->string('employmentStatus_FI',40);
			$table->string('contactNumber_FI',40);
			$table->string('grossIncomePerMonth_FI',40);
			$table->smallInteger('activity');
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
		Schema::drop('tblMember');
	}

}


