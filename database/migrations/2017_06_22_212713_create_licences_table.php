<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lic_no', 20);
            $table->date('lic_validity');
            $table->integer('category_id')->index('fk_lic_cat');
            $table->integer('type_id')->index('fk_lic_typ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      $table->dropForeign('fk_lic_cat');
			$table->dropForeign('fk_lic_dri');
			$table->dropForeign('fk_lic_typ');
    }
}
