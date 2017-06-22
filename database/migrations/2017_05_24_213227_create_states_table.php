<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2017_05_19_203857_create_passengers_table.php
        Schema::create('passengers', function (Blueprint $table) {
          $table->increments('id');
          $table->string('pas_name',  30);
          $table->string('pas_last',  35);
          $table->string('pas_cc',    12)->default('');
          $table->string('email')->unique();
          $table->string('password');
          $table->string('pas_movil', 12);
          $table->string('pas_username', 30)->default('');
          $table->text('pas_location', 65535)->nullable();
          $table->float('pas_qual',   10, 0)->default(5);
          $table->integer('payments_id')->default(0);
          $table->integer('states_id')->unsigned();
          $table->rememberToken();
          $table->timestamps();
=======
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('state', 20);
            $table->timestamps();
>>>>>>> 63a498a15c6f07a5bea8cc3cda77dae5c1433fdc:database/migrations/2017_05_24_213227_create_states_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
