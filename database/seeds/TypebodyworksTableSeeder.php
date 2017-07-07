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
        for ($i=0; $i < 5; $i++) {
          \DB::table('typebodyworks')->insert([
             'bodywork'      =>  $faker->company,
           ]);
        }
    }
}
