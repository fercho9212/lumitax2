<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

          \DB::table('sizes')->insert([
             'size'      =>  'Amplio',
           ]);
           
           \DB::table('sizes')->insert([
              'size'      =>  'Reducido',
            ]);
    }
}
