<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
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
      \DB::table('passengers')->insert([
        'pas_name'       =>  'treesign',
        'pas_last'       =>  'ferney9212@gmail.com',
        'pas_cc'         =>   '1234563',
        'email'       =>  'treesign@gmail.com',
        'pas_movil'      =>  '55555',
        'pas_username'   =>  'treesign',
        'password'       =>   bcrypt('123'),
        'payments_id'    =>  '1',
        'states_id'      =>  '1',
        //'api_token' => str_random(50),
      ]);
      \DB::table('drivers')->insert([
        'dri_name'       =>  'treesign',
        'dri_last'       =>  'driver@gmail.com',
        'dri_cc'         =>   '1234563',
        'email'       =>  'driver@gmail.com',
        'dri_movil'      =>  '55555',
        'dri_address'      =>  '55555',
        'dri_phone'   =>  'treesign',
        'dri_photo'   =>  'treesign',
        'password'       =>   bcrypt('123.'),
        'dri_location'    =>  '1',
        'states_id'      =>  '1',
        //'api_token' => str_random(50),
      ]);
    }
}
