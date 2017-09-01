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
      $this->call(TypesRolesSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(TypesLicencesTableSeeder::class);
      $this->call(CategoryLicencesTableSeeder::class);
      $this->call(StatesTableSeeder::class);
      $this->call(TypeVehiclesTableSeeder::class);
      $this->call(BrandVehiclesTableSeeder::class);
      $this->call(ClassVehiclesTableSeeder::class);
      $this->call(TypebodyworksTableSeeder::class);
      $this->call(InsuranceTableSeeder::class);
      $this->call(ApiStatesTableSeeder::class);
      $this->call(PaymentsTableSeeder::class);
      $this->call(StateservicesTableSeeder::class);
      $this->call(SizesTableSeeder::class);
      $this->call(TyperegistersSeeder::class);

    }
}
