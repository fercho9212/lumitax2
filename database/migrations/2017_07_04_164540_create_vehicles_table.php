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
          $table->string('veh_motor', 30);
          $table->integer('veh_serie');
          $table->string('veh_vin', 12);
          $table->string('veh_color', 60);
          $table->string('veh_line', 60);//Duster Expression
          //$table->text('veh_observa');
          $table->integer('state_id')->default(1)->index('fk_vehicles_states');
          $table->integer('typevehicles_id')->default(1)->index('fk_vehicles_types');//Motocicleta ,camioneta,taxi
          //$table->integer('typelines_id')->default(1)->index('fk_vehicles_lines');
          $table->integer('brands_id')->default(1)->index('fk_vehicles_brands');//Marca, yhamaha,chevrolet
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
