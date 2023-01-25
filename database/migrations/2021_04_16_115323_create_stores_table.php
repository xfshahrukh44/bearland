<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('category')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('type')->nullable();
            $table->string('price')->nullable();
            $table->string('sku')->nullable();
            $table->string('length')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('image')->nullable();
            $table->string('color')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stores');
    }
}
