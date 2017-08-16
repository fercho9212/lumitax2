<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

          \DB::table('payments')->insert([
             'payment'      =>  'Efectivo',
           ]);
           \DB::table('payments')->insert([
              'payment'      =>  'Crédito',
            ]);
            \DB::table('payments')->insert([
               'payment'      =>  'Vale',
             ]);
    }
}
