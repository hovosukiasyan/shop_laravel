<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('launch_status');
            $table->string('screen_size');
            $table->string('screen_resolution');
            $table->string('ram');
            $table->string('memory');
            $table->string('main_camera');
            $table->string('front_camera');
            $table->string('battery');
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
        Schema::dropIfExists('tablets');
    }
}
