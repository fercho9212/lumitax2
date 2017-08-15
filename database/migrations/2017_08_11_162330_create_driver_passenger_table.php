<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverPassengerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_passenger', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('driver_id')->unsigned();
          $table->integer('passenger_id')->unsigned();

          $table->timestamp('date_start')->nullable();
          $table->string('address_start',100);

          $table->integer('stateservice_id')->unsigned();

          $table->integer('payment_id')->unsigned();
          $table->integer('price');

          $table->timestamp('date_end')->nullable();
          $table->string('address_end',100);


          $table->string('description')->default('this is a test');//0->No Select 1->Vehiculo Seleccionado

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_passenger');
    }
}
