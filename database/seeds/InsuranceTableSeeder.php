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

          \DB::table('insurance')->insert([
             'ins_name'         =>  'SOAT',
             'ins_code'         =>  '88787',
             'ins_description'  =>  '',
           ]);
           \DB::table('insurance')->insert([
              'ins_name'         =>  'Revisión Técnico',
              'ins_code'         =>  '45454',
              'ins_description'  =>  '',
            ]);
            \DB::table('insurance')->insert([
               'ins_name'         =>  'Tarjeta de operacion',
               'ins_code'         =>  '4545',
               'ins_description'  =>  '',
             ]);
             \DB::table('insurance')->insert([
                'ins_name'         =>  'Poliza de Responsabilidad Civil Contractual',
                'ins_code'         =>  '45454',
                'ins_description'  =>  '',
              ]);
              \DB::table('insurance')->insert([
                 'ins_name'         =>  'Poliza de Responsabilidad Civil Extracontractual',
                 'ins_code'         =>  '999',
                 'ins_description'  =>  '',
               ]);
               \DB::table('insurance')->insert([
                  'ins_name'         =>  'Revisión Preventiva',
                  'ins_code'         =>  '999787',
                  'ins_description'  =>  '',
                ]);

    }
}
