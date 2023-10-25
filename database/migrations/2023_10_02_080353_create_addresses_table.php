<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->string('phone', 30);
            $table->string('address', 30);
            $table->string('post_code', 10);
            $table->string('country', 20);
            $table->string('city', 20);
            $table->string('state', 20);
            $table->enum('type', [0,1,2]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
