<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class SupplierGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier_groups')->truncate();
        $datas = [
            [1, 'đồ ăn', 0],
            [2, 'đồ uống', 0],
            [3, 'tráng miệng', 0],
        ];
        foreach ($datas as $data) {
            Database\SupplierGroup::create([
            	'id' => $data[0],
                'name' => $data[1],
                'status' => $data[2],
            ]);
        }
    }
}
