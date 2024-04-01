<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclecategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehiclecategory', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('picture')->nullable();
			$table->text('description');
			$table->integer('max_bags')->nullable();
			$table->integer('max_seats')->nullable();
			$table->decimal('price_per_km');
			$table->decimal('price_per_hr');
			$table->unsignedBigInteger('created_by');

			$table->integer('modified_by')->nullable();
			$table->enum('is_public', array('1',''))->default('1');
			$table->timestamps();

			$table->foreign('created_by')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehiclecategory');
	}

}
