<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('user');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('product_id');
            $table->integer('price');
            $table->string('images', 100);
            $table->integer('sku');
            $table->string('availability',20);
            $table->string('size',150)->nullable();
            $table->text('colors');
            $table->enum('status',["0","1","2","3","4","5","6","7","8","9"])->default("1") ;
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
        Schema::dropIfExists('products');
    }
}
