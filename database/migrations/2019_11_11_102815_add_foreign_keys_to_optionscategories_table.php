<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOptionscategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('optionscategories', function(Blueprint $table)
		{
			$table->foreign('extraOption_id')->references('id')->on('extraoptions')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('vehicleCategory_id')->references('id')->on('vehiclecategory')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('optionscategories', function(Blueprint $table)
		{
			$table->dropForeign('optionscategories_extraoption_id_foreign');
			$table->dropForeign('optionscategories_vehiclecategory_id_foreign');
		});
	}

}
