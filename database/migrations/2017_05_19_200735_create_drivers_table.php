<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dri_name',30);
            $table->string('dri_last',30);
            $table->bigInteger('dri_cc');
            $table->string('dri_address');
            $table->string('dri_movil');
            $table->string('dri_phone');
            $table->string('dri_photo');
            $table->string('dri_location',70)->default('');
            $table->integer('messages_id')->default(5);
            $table->string('email')->unique();
            $table->string('password');
            $table->float('dri_qual',10,0)->default(5);
            $table->integer('state_id')->nullable()->index('fk_dri_state');
            //$table->timestamp('dri_date_reg')->default(DB::raw('CURRENT_TIMESTAMP'));
            //$table->timestamp('dateup')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('drivers');
    }
}
