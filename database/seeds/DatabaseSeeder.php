<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductSalesTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(ProductProvidersTableSeeder::class);
    }
}
