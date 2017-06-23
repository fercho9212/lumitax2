<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('users')->insert([
         'name'      =>  'Ferney Jerez',
         'email'     =>  'ferney9212@gmail.com',
         'password'  =>   bcrypt('FERfer123.'),
       ]);
       $faker=Faker::create();
       for ($i=0; $i < 5; $i++) {
         \DB::table('users')->insert([
            'name'      =>  $faker->firstName,
            'email'     =>  $faker->lastName,
            'password'  =>   bcrypt('FERfer123.'),
          ]);
       }

    }
}
