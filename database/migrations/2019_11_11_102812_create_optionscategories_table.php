<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionscategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('optionscategories', function(Blueprint $table)
		{
			$table->bigInteger('extraOption_id')->unsigned();
			$table->bigInteger('vehicleCategory_id')->unsigned()->index('optionscategories_vehiclecategory_id_foreign');
			$table->timestamps();
			$table->primary(['extraOption_id','vehicleCategory_id']);


		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('optionscategories');
	}

}
