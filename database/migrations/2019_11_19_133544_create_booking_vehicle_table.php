<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_vehicle', function (Blueprint $table) {
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->date('booking_date')->nullable();
            $table->timestamp('assigned_at')->default(Carbon::now());

            $table->primary(['booking_id', 'vehicle_id']);

            $table->foreign('booking_id')->references('id')->on('booking')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicles')
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
        Schema::dropIfExists('booking_vehicle');
    }
}
