<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToDriverPassenger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('driver_passenger', function (Blueprint $table) {
          $table->foreign('passenger_id','fk_dp_passenger')->references('id')->on('passengers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
          $table->foreign('driver_id','fk_dp_driver')->references('id')->on('drivers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
          $table->foreign('vehicle_id','fk_dp_vehicle')->references('id')->on('vehicles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
          $table->foreign('payment_id','fk_dp_payment')->references('id')->on('payments')->onUpdate('RESTRICT')->onDelete('RESTRICT');
          $table->foreign('stateservice_id','fk_dp_state')->references('id')->on('stateservices')->onUpdate('RESTRICT')->onDelete('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('driver_passenger', function (Blueprint $table) {
          $table->dropForeign('fk_dp_passenger');
          $table->dropForeign('fk_dp_driver');
          $table->dropForeign('fk_dp_payment');
          $table->dropForeign('fk_dp_state');
        });
    }
}
