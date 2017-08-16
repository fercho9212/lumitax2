<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TypebodyworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

          \DB::table('typebodyworks')->insert([
             'bodywork'      =>  'Limosina',
           ]);

           \DB::table('typebodyworks')->insert([
              'bodywork'      =>  'Camioneta',
            ]);

            \DB::table('typebodyworks')->insert([
               'bodywork'      =>  'Furgoneta',
             ]);

             \DB::table('typebodyworks')->insert([
                'bodywork'      =>  'hatchback',
              ]);
              \DB::table('typebodyworks')->insert([
                 'bodywork'      =>  'Sedan 4 puertas',
               ]);
               \DB::table('typebodyworks')->insert([
                  'bodywork'      =>  'Techo rígido',
                ]);

    }
}
