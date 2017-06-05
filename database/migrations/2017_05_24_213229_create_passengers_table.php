<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
          $table->increments('id');
    			$table->string('pas_name',  30);
    			$table->string('pas_last',  35);
          $table->string('pas_cc',    12)->default('');
          $table->string('pas_mail',  45)->unique()->required();
    			$table->string('pas_movil', 12);
    			$table->string('pas_username', 30)->default('');
    			$table->string('password');
    			$table->text('pas_location', 65535)->nullable();
          $table->float('pas_qual',   10, 0)->default(5);
          $table->integer('payments_id')->default(0);
    			$table->integer('states_id');
          $table->rememberToken();
          $table->timestamps();
          //$table->string('api_token')->unique();
          /**
           * Foreing key
           */
          // $table->foreign('states_id')->references('id')->on('states')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passengers');
    }
}
