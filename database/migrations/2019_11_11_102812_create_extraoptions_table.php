<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExtraoptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('extraoptions', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('image_name', 150)->nullable();
			$table->text('description')->nullable();
			$table->string('title', 50);
			$table->decimal('price')->nullable();
			$table->enum('is_active', array('yes','no'))->nullable()->default('no');
			$table->integer('max_quantity')->nullable();
			$table->enum('is_quantity', array('yes','no'))->nullable()->default('yes');
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
		Schema::drop('extraoptions');
	}

}
