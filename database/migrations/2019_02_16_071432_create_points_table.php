<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('trail_id');
            $table->float('long');
            $table->float('lat');
            $table->float('angle');
            $table->float('speed');
            $table->float('magnetometer_x');
            $table->float('magnetometer_y');
            $table->float('magnetometer_z');
            $table->float('accelerometer_x');
            $table->float('accelerometer_y');
            $table->float('accelerometer_z');
            $table->integer('step_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}
