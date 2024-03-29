<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug',40);
            $table->string('icon',40);
            $table->string('name',40);
            $table->unsignedInteger('parent_id')->nullable();
            //untuk membuat sub bab
            $table->foreign('parent_id')->on('categories')->references('id')->onUpdate('cascade')->onDelete('cascade');
            //relase dengan user
            $table->unsignedInteger('user_id')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
