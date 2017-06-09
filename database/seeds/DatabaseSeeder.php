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
      \DB::table('states')->insert([
        'state'      =>  'Activo',
      ]);

      \DB::table('passengers')->insert([
        'pas_name'       =>  'treesign',
        'pas_last'       =>  'ferney9212@gmail.com',
        'pas_cc'         =>   '1234563',
        'pas_mail'       =>  'treesign@gmail.com',
        'pas_movil'      =>  '55555',
        'pas_username'   =>  'treesign',
        'password'       =>   bcrypt('123'),
        'payments_id'    =>  '1',
        'states_id'      =>  '1',
        'remember_token' => str_random(10),
        //'api_token' => str_random(50),
      ]);

    }
}
