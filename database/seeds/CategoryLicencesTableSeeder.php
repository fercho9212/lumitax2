<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CategoryLicencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker=Faker::create();

        \DB::table('categorylicences')->insert([
           'category'      =>  'C1',
         ]);
         \DB::table('categorylicences')->insert([
            'category'      =>  'C2',
          ]);
          \DB::table('categorylicences')->insert([
             'category'      =>  'C3',
           ]);

    }
}
