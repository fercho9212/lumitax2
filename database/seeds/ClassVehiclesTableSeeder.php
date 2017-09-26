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
             'class'      =>  'Compacto',
           ]);
           \DB::table('classvehicles')->insert([
              'class'      =>  'Sedan',
            ]);
            \DB::table('classvehicles')->insert([
               'class'      =>  'Camioneta',
             ]);
             \DB::table('classvehicles')->insert([
                'class'      =>  'Van',
              ]);
    }
}
