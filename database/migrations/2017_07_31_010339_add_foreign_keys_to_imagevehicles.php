<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToImagevehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imagevehicles', function (Blueprint $table) {
          $table->foreign('vehicle_id','fk_img_vehicle')->references('id')->on('vehicles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imagevehicles', function (Blueprint $table) {
            $table->dropForeign('fk_img_vehicle');
        });
    }
}
