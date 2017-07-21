<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class InsuranceTableSeeder extends Seeder
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
          \DB::table('insurance')->insert([
             'ins_name'         =>  $faker->firstName,
             'ins_code'         =>  $faker->firstName,
             'ins_description'  =>  $faker->firstName,
           ]);
        }
    }
}
