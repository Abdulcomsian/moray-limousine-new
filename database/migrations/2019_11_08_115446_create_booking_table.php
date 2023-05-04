<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vehicle_type_id');
            $table->double('lat_pck');
            $table->double('long_pck');
            $table->double('lat_drop')->nullable();
            $table->double('long_drop')->nullable();
            $table->string('pick_address','300');
            $table->string('drop_address','300')->nullable();
            $table->decimal('travel_amount');
            $table->decimal('extra_options_amount')->nullable();
            $table->decimal('net_amount')->nullable();
            $table->enum('payment_status',['paid','pending','canceled'])->default('pending');
            $table->float('estimated_distance')->nullbale();
            $table->float('estimated_time')->nullable();
            $table->time('pick_time');
            $table->date('pick_date');
            $table->enum('booking_type',['distance','time','fixed']);
            $table->enum('booking_status',['pending','approved','disapproved','canceled','completed'])->default('pending');

            $table->timestamps();

            $table->foreign('vehicle_type_id')->references('id')->on('vehiclecategory')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('booking');
    }
}
