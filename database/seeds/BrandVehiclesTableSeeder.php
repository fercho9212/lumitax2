<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class BrandVehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

            \DB::table('brandvehicles')->insert([
               'brand'      =>  'Hyundai',
             ]);
             \DB::table('brandvehicles')->insert([
                'brand'      =>  'Kya',
              ]);
             \DB::table('brandvehicles')->insert([
                 'brand'      =>  'Jac',
               ]);
            \DB::table('brandvehicles')->insert([
                  'brand'      =>  'Faw',
              ]);
              \DB::table('brandvehicles')->insert([
                  'brand'      =>  'Chery',
              ]);
              \DB::table('brandvehicles')->insert([
                  'brand'      =>  'Chevrolet',
              ]);
              \DB::table('brandvehicles')->insert([
                  'brand'      =>  'Otros',
              ]);


    }
}
