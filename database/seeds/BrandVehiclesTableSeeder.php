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
             'brand'      =>  'CREVROLET',
           ]);
           \DB::table('brandvehicles')->insert([
              'brand'      =>  'BRAND',
            ]);
            \DB::table('brandvehicles')->insert([
               'brand'      =>  'HYUNDAI',
             ]);
            \DB::table('brandvehicles')->insert([
                'brand'      =>  'RENAULT',
            ]);	

    }
}
