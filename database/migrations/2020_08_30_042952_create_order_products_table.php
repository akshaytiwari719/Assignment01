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
            $table->integer('order_Id')->unsigned();
            $table->integer('product_Id')->unsigned();
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('total');
            $table->date('ship_date');

            $table->foreign('order_Id')->references('id')->on('order')->onDelete('cascade');
            $table->foreign('product_Id')->references('id')->on('products')->onDelete('cascade');            
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
