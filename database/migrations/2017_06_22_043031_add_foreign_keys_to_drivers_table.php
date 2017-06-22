<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('drivers', function(Blueprint $table)
      {
        $table->foreign('state_id', 'fk_dri_state')->references('id')->on('states')->onUpdate('RESTRICT')->onDelete('RESTRICT');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('drivers', function(Blueprint $table)
        {
          $table->dropForeign('fk_dri_state');
        });
    }
}
