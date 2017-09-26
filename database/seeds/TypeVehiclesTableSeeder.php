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
             'type'      =>  'Atos',
           ]);
           \DB::table('typevehicles')->insert([
              'type'      =>  'i10',
            ]);
          \DB::table('typevehicles')->insert([
               'type'      =>  'Verna',
             ]);
           \DB::table('typevehicles')->insert([
                  'type'   => 'Soul',
          ]);
          \DB::table('typevehicles')->insert([
                 'type'   => 'Picanto',
         ]);
         \DB::table('typevehicles')->insert([
                'type'   => 'Starjac',
              ]);
         \DB::table('typevehicles')->insert([
                     'type'   => 'CA',
                   ]);
          \DB::table('typevehicles')->insert([
                               'type'   => 'Tigo',
                             ]);
          \DB::table('typevehicles')->insert([
                                'type'   => 'Chevitaxi',
                              ]);
          \DB::table('typevehicles')->insert([
                                  'type'   => 'Otros',
                                                  ]);

    }
}
