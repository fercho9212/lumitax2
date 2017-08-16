<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ClassVehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

          \DB::table('classvehicles')->insert([
             'class'      =>  'SEDAN',
           ]);
           \DB::table('classvehicles')->insert([
              'class'      =>  'VAN',
            ]);
            \DB::table('classvehicles')->insert([
               'class'      =>  'RUSTICO',
             ]);
             \DB::table('classvehicles')->insert([
                'class'      =>  ' COMPACTO',
              ]);
    }
}
