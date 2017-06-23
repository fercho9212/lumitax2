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
      for ($i=0; $i < 3; $i++) {
        \DB::table('states')->insert([
           'state'      =>  $faker->name,
         ]);
      }
    }
}
