<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name','30');
            $table->string('last_name','30');
            $table->enum('user_type',['end_user','driver','partner','admin']);
            $table->string('phone_number','30');
            $table->string('email','60')->unique();
            $table->string('password','150');
            $table->bigInteger('creator_id')->nullable();
            $table->enum('status',['approved','pending','disapproved','blocked'])->default('pending');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
