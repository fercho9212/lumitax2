<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToImagedrivers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('imagedrivers', function (Blueprint $table) {
        $table->foreign('driver_id','fk_img_driver')->references('id')->on('drivers')->onUpdate('CASCADE')->onDelete('CASCADE');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('imagedrivers', function (Blueprint $table) {
            $table->dropForeign('fk_img_driver');
        });
    }
}
