<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('company_id');
            $table->integer('count');
            $table->integer('amount');
            $table->integer('user_id');
            $table->string('size', 60);
            $table->string('color', 160);
            $table->integer('address_id');
            $table->enum('status',['Pending','Processing','Refund','Delivered','Complete','Canceled'])->default("Pending") ;
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
        Schema::dropIfExists('orders');
    }
}
