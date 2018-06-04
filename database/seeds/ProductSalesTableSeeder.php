<?php

use Illuminate\Database\Seeder;

class ProductSalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductSale::class, 25)->create();
    }
}
