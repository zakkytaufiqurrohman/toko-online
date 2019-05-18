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
            $table->string('photo');
            $table->string('name');
            $table->string('slug');
            $table->longtext('description');
            $table->integer('stock');
            $table->integer('price');
            //relasi dengan category
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->on('categories')->references('id')->onUpdate('cascade')->onDelete('cascade');
            ////relasi dengan table users
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
