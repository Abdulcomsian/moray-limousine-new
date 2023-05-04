<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclecategoryVehiclesubtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclecategory_vehiclesubtype', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subtype_id');
            $table->primary(['category_id', 'subtype_id']);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('vehiclecategory')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subtype_id')->references('id')->on('vehicle_subtypes')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiclecategory_vehiclesubtype');
    }
}
