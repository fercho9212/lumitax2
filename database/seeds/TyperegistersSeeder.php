<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TyperegistersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

          \DB::table('typeregisters')->insert([
             'type'      =>  'web',
           ]);

           \DB::table('typeregisters')->insert([
              'type'      =>  'móvil',
            ]);

    }
}
