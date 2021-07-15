<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id');
            $table->foreignId('category_id');
            $table->string('name');
            $table->string('description');
            $table->double('price');
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->string('type');
            $table->unsignedBigInteger('age');
            $table->unsignedBigInteger('kilometer');
            $table->string('status')->default(config('constants.status.active'));
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
