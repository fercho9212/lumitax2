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
<<<<<<< HEAD
=======
      \DB::table('states')->insert([
        'state'      =>  'Activo',
      ]);

>>>>>>> 63a498a15c6f07a5bea8cc3cda77dae5c1433fdc
      \DB::table('passengers')->insert([
        'pas_name'       =>  'treesign',
        'pas_last'       =>  'ferney9212@gmail.com',
        'pas_cc'         =>   '1234563',
<<<<<<< HEAD
        'email'       =>  'treesign@gmail.com',
=======
        'pas_mail'       =>  'treesign@gmail.com',
>>>>>>> 63a498a15c6f07a5bea8cc3cda77dae5c1433fdc
        'pas_movil'      =>  '55555',
        'pas_username'   =>  'treesign',
        'password'       =>   bcrypt('123'),
        'payments_id'    =>  '1',
        'states_id'      =>  '1',
<<<<<<< HEAD
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
=======
        'remember_token' => str_random(10),
        //'api_token' => str_random(50),
      ]);

>>>>>>> 63a498a15c6f07a5bea8cc3cda77dae5c1433fdc
    }
}
