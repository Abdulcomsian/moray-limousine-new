<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->date('date_of_birth');
            $table->enum('gender',['Male','Female']);
            $table->string('phone_number','15');
            $table->string('whats_app','15');
            $table->string('skype_id','25')->nullable();
            $table->string('address','150');
            $table->string('permanent_address','150');
            $table->string('default_location','150')->nullable();
            $table->text('additional_information')->nullable();

            $table->string('vehicle_licence_no','100');
            $table->date('vehicle_licence_expiry');
            $table->string('vehicle_licence_image','100');

            $table->string('pco_licence_no','100');
            $table->date('pco_licence_expiry');
            $table->string('pco_licence_image','100');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->boolean('is_available')->default(true);
            // $table->foreign('user_id')
            //     ->references('id')->on('users')
            //     ->onDelete('cascade');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver');
        $table->dropForeign('drivers_user_id_foreign');
        $table->dropColumn('is_available');
    }
}
