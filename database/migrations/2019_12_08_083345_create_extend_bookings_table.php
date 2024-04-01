<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtendBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extend_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('booking_id');
            $table->string('previous_drop_location','150');
            $table->string('new_drop_location','150')->nullable();
            $table->float('extended_distance')->nullable();
            $table->float('extended_duration');
            $table->double('new_drop_lat')->nullable();
            $table->double('new_drop_long')->nullable();
            $table->decimal('previous_net_amount');
            $table->decimal('extended_amount');
            $table->decimal('new_net_amount');
            $table->enum('payment_status',['paid','unpaid','pending'])->default('pending');

            $table->foreign('booking_id')->references('id')->on('booking')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('extend_bookings');
    }
}
