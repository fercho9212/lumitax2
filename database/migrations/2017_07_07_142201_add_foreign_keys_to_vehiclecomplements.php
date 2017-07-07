<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToVehiclecomplements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehiclecomplements', function (Blueprint $table) {
            $table->foreign('typebodywork_id', 'fk_vc_bodywork')->references('id')->on('typebodyworks')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehiclecomplements', function (Blueprint $table) {
          $table->dropForeign('fk_vc_bodywork');
        });
    }
}
