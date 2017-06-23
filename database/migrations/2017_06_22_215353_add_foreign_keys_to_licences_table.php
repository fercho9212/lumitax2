<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToLicencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('licences', function (Blueprint $table) {

          $table->foreign('category_id','fk_lic_cat')->references('id')->on('categorylicences')->onUpdate('RESTRICT')->onDelete('RESTRICT');
          $table->foreign('id', 'fk_lic_dri')->references('id')->on('drivers')->onUpdate('RESTRICT')->onDelete('CASCADE');
          $table->foreign('type_id', 'fk_lic_typ')->references('id')->on('typeslicences')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {


        Schema::table('licences', function (Blueprint $table) {
          $table->dropForeign('fk_lic_cat');
          $table->dropForeign('fk_lic_dri');
          $table->dropForeign('fk_lic_typ');
        });

    }
}
