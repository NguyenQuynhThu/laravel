<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            $table->bigIncrements('car_id');
            $table->unsignedBigInteger("model_id");
            $table->string('car_plate')->unique();
            $table->string('car_color');
            $table->year('manufacture_year');
            $table->unsignedTinyInteger("active")->default(1);
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
        Schema::dropIfExists('car');
        Schema::table('car', function (Blueprint $table) {
            $table->foreign("model_id")->references("model_id")->on("model");
        });
    }
}
