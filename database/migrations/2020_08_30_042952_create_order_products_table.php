<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orderId')->unsigned();
            $table->integer('productId')->unsigned();
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('total');
            $table->date('shipDate');

            $table->foreign('orderId')->references('id')->on('order')->onDelete('cascade');
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');            
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
        Schema::dropIfExists('order_products');
    }
}
