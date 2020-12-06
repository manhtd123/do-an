<?php

use Illuminate\Database\Seeder;

class BillProductDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\BillProductDetail::class, 30)->create();
    }
}
