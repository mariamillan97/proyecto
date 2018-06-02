<?php

use Illuminate\Database\Seeder;

class ProductProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductProvider::class, 10)->create();
    }
}
