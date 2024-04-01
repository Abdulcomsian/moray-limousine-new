<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclepricingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehiclepricing', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('created_by');
            $table->enum('pricing_type', array('per_km','per_hr'));
            $table->decimal('from');
            $table->decimal('to');
            $table->boolean('is_price_fixed')->default(false);
            $table->decimal('base_price')->nullable();
            $table->decimal('fixed_price')->nullable();

            $table->foreign('category_id')->references('id')
                ->on('vehiclecategory')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('created_by')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');;
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
		Schema::drop('vehiclepricing');
	}

}
