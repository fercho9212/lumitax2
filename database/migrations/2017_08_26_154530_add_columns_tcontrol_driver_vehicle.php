<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsTcontrolDriverVehicle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('driver_vehicle', function (Blueprint $table) {
          $table->string('dv_no')->nullable();
          $table->string('dv_nit')->nullable();
          $table->integer('state_id')->nullable();
          $table->date('dv_date_ex')->nullable();//Tipo de rol
          $table->date('dv_date_ven')->nullable();
          $table->string('dv_qr')->nullable();
          $table->foreign('state_id','fk_dv_state')->references('id')->on('states')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
            //
        });
    }
}
