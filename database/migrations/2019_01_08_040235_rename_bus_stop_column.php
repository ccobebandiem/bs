<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameBusStopColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bus_stop', function(Blueprint $table) {
            $table->renameColumn('location_x', 'lat');
            $table->renameColumn('location_y', 'lng');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bus_stop', function(Blueprint $table) {
            $table->renameColumn('lat', 'location_x');
            $table->renameColumn('lng', 'location_y');
        });
    }
}
