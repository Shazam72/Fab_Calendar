<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_params', function (Blueprint $table) {
            $table->id();
            $table->time('time_start');
            $table->time('time_end');
            $table->string('day');
            $table->date('date');
            $table->integer('places');
            $table->unsignedBigInteger('statut_id');
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
        Schema::dropIfExists('reservation_params');
    }
}
