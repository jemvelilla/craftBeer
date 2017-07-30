<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->text('adr_address')->nullable();
            $table->string('formatted_address')->nullable();
//             $table->string('formatted_phone_number', 20);
            $table->string('icon')->nullable();
            $table->string('id')->nullable();
            $table->string('international_phone_number', 20)->nullable();
            $table->string('name')->nullable();
            $table->string('place_id')->nullable();
      		$table->integer('price_level')->nullable();
      		$table->float('rating')->nullable();
      		$table->string('reference')->nullable();
      		$table->string('scope')->nullable();
      		$table->string('url')->nullable();
      		$table->integer('utc_offset')->nullable();
      		$table->string('vicinity')->nullable();
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
        Schema::dropIfExists('results');
    }
}
