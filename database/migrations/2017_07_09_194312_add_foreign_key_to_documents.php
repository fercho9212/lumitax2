<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
          $table->foreign('vehicle_id','fk_doc_vehicle')->references('id')->on('vehicles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
          $table->foreign('insurance_id','fk_doc_insurance')->references('id')->on('insurance')->onUpdate('RESTRICT')->onDelete('RESTRICT');
          $table->unique(['vehicle_id', 'insurance_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
          $table->dropForeign('fk_doc_vehicle');
        //  $table->dropForeign('fk_doc_insurance');
        });
    }
}
