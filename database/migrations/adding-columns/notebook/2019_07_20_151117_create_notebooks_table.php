<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotebooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notebooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
	        $table->string('picture');	
            $table->integer('price');
            $table->string('screen_size');
            $table->string('screen_resolution');
            $table->string('cpu');
            $table->string('ram');
            $table->string('hard_drive');
            $table->string('graphic_card');
            $table->string('touch_screen');
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
        Schema::dropIfExists('notebooks');
    }
}
