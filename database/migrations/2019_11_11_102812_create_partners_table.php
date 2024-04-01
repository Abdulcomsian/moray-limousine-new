<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partners', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->bigInteger('user_id');
			$table->string('skype_id', 50)->nullable();
			$table->date('date_of_birth');
			$table->string('phone_number', 20);
			$table->string('whats_app', 20)->nullable();
			$table->string('address', 150)->nullable();
			$table->enum('gender', array('male','female'));
			$table->string('default_location');
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
		Schema::drop('partners');
	}

}
