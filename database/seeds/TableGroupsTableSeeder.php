<?php

use Illuminate\Database\Seeder;

class TableGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\TableGroup::class, 5)->create();
    }
}
