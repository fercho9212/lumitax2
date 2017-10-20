<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ApiStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker=Faker::create();

      \DB::table('apistates')->insert([
         'api_state'      =>  'libre',
       ]);

       \DB::table('apistates')->insert([
          'api_state'      =>  'ocupado',
        ]);
    }
}
