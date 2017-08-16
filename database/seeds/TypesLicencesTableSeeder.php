<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TypesLicencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

          \DB::table('typeslicences')->insert([
             'type'      =>  'Particular',
           ]);

           \DB::table('typeslicences')->insert([
              'type'      =>  'Público',
            ]);

    }
}
