<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicles', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('image_name', 200)->nullable();
			$table->string('title', 50);
			$table->string('plate', 20);
			$table->string('model_no', 20);
			$table->bigInteger('vehicleCategory_id')->unsigned()->nullable()->index('vehicles_vehiclecategory_id_foreign');
			$table->string('standard', 10);
			$table->string('interior_color', 50)->nullable();
			$table->string('exterior_color', 50)->nullable();
			$table->string('length', 30);
			$table->string('engine_capacity', 30);
			$table->text('short_description', 65535)->nullable();
			$table->enum('is_available', array('YES','NO'))->default('YES');
			$table->bigInteger('creator_id')->unsigned();
			$table->string('fuel_type', 20);
			$table->enum('transmission', array('auto','manual'));
			$table->enum('status', array('approved','blocked','pending'))->default('pending');
			$table->timestamps();
			$table->integer('type_id')->nullable();
			$table->integer('category_id')->nullable();
			$table->integer('price_per_hour')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vehicles');
	}

}
