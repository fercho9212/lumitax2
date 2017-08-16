<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class StateservicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker=Faker::create();

      \DB::table('stateservices')->insert([
           'state'      =>  'En proceso',
         ]);
       \DB::table('stateservices')->insert([
            'state'      =>  'Cancelado',
          ]);
        \DB::table('stateservices')->insert([
                'state'      =>  'Finalizado',
        ]);

    }
}
