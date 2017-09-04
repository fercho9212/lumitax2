<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclecomplementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclecomplements', function (Blueprint $table) {

            $table->integer('id',true);
            $table->string('vc_brakes',30);
            $table->string('vc_Airbags',2);
            $table->boolean('vc_head');
            $table->string('vc_doors',2);
            $table->string('vc_cabin',30);
            $table->string('vc_passagers',2);
            $table->string('vc_space',30);
            $table->string('vc_sillateria',30);
            $table->string('vc_cellar',30);
            $table->string('vc_cylinder',30);
            $table->string('vc_power',30);
            $table->integer('typebodywork_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

            Schema::dropIfExists('vehiclecomplements');

    }
}
