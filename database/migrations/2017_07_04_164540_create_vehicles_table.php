<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
          $table->integer('id', true);
          $table->string('placa', 7);
          $table->integer('veh_model');
          $table->string('veh_motor', 15);
          $table->string('veh_serie',15);
          $table->string('veh_vin', 15);
          $table->string('veh_color', 40);

          //$table->text('veh_observa');
          $table->integer('class_id')->unsigned();
          $table->integer('state_id')->default(1)->index('fk_vehicles_states');
          $table->integer('typevehicle_id')->unsigned();//Motocicleta ,camioneta,taxi
          //$table->integer('typelines_id')->default(1)->index('fk_vehicles_lines');
          $table->integer('brand_id')->unsigned();//Marca, yhamaha,chevrolet
          $table->integer('leveles_id')->default(1)->index('fk_vehicles_levels');

          //$table->integer('classvehicles_id')->default(1)->index('fk_veh_class');
          $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

            Schema::dropIfExists('vehicles');

    }
}
