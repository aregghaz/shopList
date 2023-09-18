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
            $table->increments('id');
            $table->string('name', 30)->nullable();
            $table->string('surname', 30)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone',30);
            $table->string('address',100)->nullable();
            $table->string('post_code',10)->nullable();
            $table->string('country',20)->nullable();
            $table->string('city',20)->nullable();
            $table->string('state',30)->nullable();
            $table->enum('role', ['admin', 'user', 'client', 'staff'])->default('user');
            $table->string('email_verified')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->string('password')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('avatar')->nullable();
            $table->string('avatar_original')->nullable();
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
