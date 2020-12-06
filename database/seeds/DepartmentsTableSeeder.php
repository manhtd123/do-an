<?php

use Illuminate\Database\Seeder;
use App\Models as Database;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->truncate();
        $departments = [
            [4, 'lễ tân'],
            [2, 'thu ngân'],
            [3, 'bếp'],
            [1, 'quản lý']
        ];
        foreach ($departments as $department) {
            Database\Department::create([
            	'id' => $department[0],
                'name' => $department[1],
            ]);
        }
    }
}
