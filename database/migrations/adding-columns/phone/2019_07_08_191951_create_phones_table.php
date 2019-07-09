<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
	        $table->string('picture');	
            $table->integer('price');
            $table->integer('launch_status');
            $table->double('screen_size', 15, 8);
            $table->string('screen_resolution');
            $table->integer('ram');
            $table->integer('memory');
            $table->string('main_camera');
            $table->string('front_camera');
            $table->integer('battery');
            $table->integer('sim_card_quantity');
            $table->string('os');
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
        Schema::dropIfExists('phones');
    }
}
