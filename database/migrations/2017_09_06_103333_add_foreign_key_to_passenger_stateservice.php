<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToPassengerStateservice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('passenger_stateservice', function (Blueprint $table) {
          $table->foreign('passenger_id','fk_rp_passenger')->references('id')->on('passengers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
          $table->foreign('stateservice_id','fk_rp_passenger_state')->references('id')->on('stateservices')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('passenger_stateservice', function (Blueprint $table) {
            $table->dropForeign('fk_rp_passenger_state');
            $table->dropForeign('fk_rp_passenger');
        });
    }
}
