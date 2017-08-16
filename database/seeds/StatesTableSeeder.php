<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker=Faker::create();

      \DB::table('states')->insert([
           'state'      =>  'Activo',
         ]);
       \DB::table('states')->insert([
            'state'      =>  'Inactivo',
          ]);
        \DB::table('states')->insert([
                'state'      =>  'Suspendido',
        ]);

    }
}
