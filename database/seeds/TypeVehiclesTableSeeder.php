<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TypeVehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

          \DB::table('typevehicles')->insert([
             'type'      =>  'Camioneta',
           ]);
           \DB::table('typevehicles')->insert([
              'type'      =>  'Automovíl',
            ]);
          \DB::table('typevehicles')->insert([
               'type'      =>  'Furgón',
             ]);
           \DB::table('typevehicles')->insert([
                  'type'   => 'Vehículo mixto adaptable',
          ]);

    }
}
