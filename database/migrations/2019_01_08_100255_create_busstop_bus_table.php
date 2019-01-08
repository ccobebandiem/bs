<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusstopBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busstop_bus', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('bus_id')->unsigned()->index();
            $table->foreign('bus_id')->references('id')->on('bus')->onDelete('cascade');

            $table->integer('bus_stop_id')->unsigned()->index();
            $table->foreign('bus_stop_id')->references('id')->on('bus_stop')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('busstop_bus');
    }
}
