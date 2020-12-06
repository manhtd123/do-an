<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SupplierGroupsTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(BillProductsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(TableGroupsTableSeeder::class);
        $this->call(TablesTableSeeder::class);
        $this->call(BillProductDetailsTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
    }
}
