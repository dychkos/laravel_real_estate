<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id('id');
            $table->tinyText('name');
            $table->text('description');
            $table->tinyText('price');
            $table->tinyText('ft_price');
            $table->tinyText('address');
            $table->integer('bedrooms_count');
            $table->integer('showers_count');
            $table->integer('floors_count');
            $table->integer('garage_count');
            $table->integer('founded_year');
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
        Schema::dropIfExists('houses');
    }
}
