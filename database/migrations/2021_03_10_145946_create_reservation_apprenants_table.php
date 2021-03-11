<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationApprenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_apprenants', function (Blueprint $table) {
            $table->id();
            $table->string('email_apprenant');
            $table->integer('status');
            $table->date('date_reservation');
            $table->integer('ID_res_param');
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
        Schema::dropIfExists('reservation_apprenants');
    }
}
