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
            $table->string('product_Name');
            $table->string('product_Description');
            $table->integer('quantity_Per_Unit');
            $table->integer('unit_Price');
            $table->integer('category_Id')->unsigned();
            $table->integer('tag_Id')->unsigned();
            
            $table->foreign('category_Id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('tag_Id')->references('id')->on('tags')->onDelete('cascade');
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
