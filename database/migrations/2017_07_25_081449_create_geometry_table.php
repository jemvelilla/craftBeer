<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeometryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geometries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('result_id')->nullable();
            $table->double('location_lat', 18, 14)->nullable();
            $table->double('location_lng', 18, 14)->nullable();
            $table->double('viewport_northeast_lat', 18, 14)->nullable();
            $table->double('viewport_northeast_lng', 18, 14)->nullable();
            $table->double('viewport_southwest_lat', 18, 14)->nullable();
            $table->double('viewport_southwest_lng', 18, 14)->nullable();
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
        Schema::dropIfExists('geometries');
    }
}
