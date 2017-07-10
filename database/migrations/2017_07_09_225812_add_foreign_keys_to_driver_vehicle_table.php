<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToDriverVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('driver_vehicle', function (Blueprint $table) {
          $table->foreign('vehicle_id','fk_dv_vehicle')->references('id')->on('vehicles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
          $table->foreign('driver_id','fk_dv_driver')->references('id')->on('drivers')->onUpdate('RESTRICT')->onDelete('RESTRICT');
          $table->unique(['vehicle_id','driver_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('driver_vehicle', function (Blueprint $table) {
            $table->dropForeign('fk_dv_vehicle');
            $table->dropForeign('fk_dv_driver')->unsigned();
        });
    }
}
