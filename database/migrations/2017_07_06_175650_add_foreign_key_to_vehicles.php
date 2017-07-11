<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->foreign('typevehicle_id','fk_vehicles_types')->references('id')->on('typevehicles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('class_id','fk_vehicles_class')->references('id')->on('classvehicles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('brand_id','fk_vehicles_brand')->references('id')->on('brandvehicles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropForeign('fk_vehicles_types');
            $table->dropForeign('fk_vehicles_class');
            $table->dropForeign('fk_vehicles_brand');
        });
    }
}