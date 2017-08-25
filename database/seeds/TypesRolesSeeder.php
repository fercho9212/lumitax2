<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TypesRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

          \DB::table('typesroles')->insert([
             'type'      =>  'SuperAdmin',
           ]);

           \DB::table('typesroles')->insert([
              'type'      =>  'Administrador',
            ]);

            \DB::table('typesroles')->insert([
               'type'      =>  'Visitante',
             ]);

    }
}
