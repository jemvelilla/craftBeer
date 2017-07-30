<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
        	$table->integer('id');
        	$table->char('bar_name');
        	$table->char('bar_name_ja');
        	$table->string('type');
        	$table->string('area');
        	$table->string('subarea_eng');
        	$table->string('subarea_ja');
        	$table->char('address_eng');
        	$table->char('address_ja');
        	$table->text('hours_eng');
        	$table->text('hours_ja');
        	$table->text('highlights_eng');
        	$table->text('highlights_ja');
        	$table->char('phone');
        	$table->string('website');
        	$table->integer('smokefree');
        	$table->integer('number_taps');
        	$table->integer('number_bottles');
        	$table->string('closest_station_eng');
        	$table->string('closest_station_ja');
        	$table->decimal('map_latitude');
        	$table->decimal('map_longitude');
        	$table->string('jbt_permalink');
        	$table->char('twitter_id');
        	$table->string('image1');
        	$table->string('image2');
        	$table->string('image3');
        	$table->string('image4');
        	$table->text('desc_eng');
        	$table->text('desc_ja');
        	$table->text('specials_eng');
        	$table->text('specials_ja');
        	$table->string('place_id')->nullable();
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
        Schema::dropIfExists('places');
    }
}
