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
            $table->integer('bedrooms_count')->default(0);
            $table->integer('showers_count')->default(0);
            $table->integer('floors_count')->default(0);
            $table->integer('garage_count')->default(0);
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
