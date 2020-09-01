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
            $table->string('Name');
            $table->string('Description');
            $table->integer('quantityPerUnit');
            $table->integer('unitPrice');
            $table->integer('categoryId')->unsigned();
            $table->integer('tagId')->unsigned();
            
            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('tagId')->references('id')->on('tags')->onDelete('cascade');
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
