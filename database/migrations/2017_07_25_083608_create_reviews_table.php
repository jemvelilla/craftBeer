<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('result_id')->nullable();
            $table->string('author_name')->nullable();
            $table->string('author_url')->nullable();
            $table->string('language')->nullable();
            $table->string('profile_photo_url')->nullable();
            $table->integer('rating')->nullable();
            $table->string('relative_time_description')->nullable();
            $table->text('text')->nullable();
            $table->integer('time')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
