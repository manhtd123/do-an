<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        $categories = [
            [1, 'đồ ăn'],
            [2, 'đồ uống'],
            [3, 'tráng miệng'],
        ];
        foreach ($categories as $category) {
            Database\Category::create([
            	'id' => $category[0],
                'name' => $category[1],
            ]);
        }
    }
}
