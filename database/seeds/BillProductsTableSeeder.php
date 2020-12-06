<?php

use Illuminate\Database\Seeder;

class BillProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\BillProduct::class, 20)->create();
    }
}
