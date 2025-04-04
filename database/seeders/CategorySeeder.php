<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = DB::table('departments')->pluck('id', 'name');
        $categories = [
            // Top-Level Categories (Parent ID = NULL)
            ['name' => 'Books', 'department_id' => 1, 'parent_id' => null, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Clothing', 'department_id' => 2, 'parent_id' => null, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hardware', 'department_id' => 3, 'parent_id' => null, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Electronics', 'department_id' => 4, 'parent_id' => null, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Food', 'department_id' => 6, 'parent_id' => null, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Beauty & Health', 'department_id' => 7, 'parent_id' => null, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Home Decor', 'department_id' => 8, 'parent_id' => null, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vehicles', 'department_id' => 11, 'parent_id' => null, 'active' => true, 'created_at' => now(), 'updated_at' => now()],

            // Subcategories of Electronics
            ['name' => 'Computers', 'department_id' => 4, 'parent_id' => 4, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Smartphones', 'department_id' => 4, 'parent_id' => 4, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'TV & Home Entertainment', 'department_id' => 4, 'parent_id' => 4, 'active' => true, 'created_at' => now(), 'updated_at' => now()],

            // Subcategories of Computers
            ['name' => 'Laptops', 'department_id' => 4, 'parent_id' => 9, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desktops', 'department_id' => 4, 'parent_id' => 9, 'active' => true, 'created_at' => now(), 'updated_at' => now()],

            // Subcategories of Smartphones
            ['name' => 'Android Phones', 'department_id' => 4, 'parent_id' => 10, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'iPhones', 'department_id' => 4, 'parent_id' => 10, 'active' => true, 'created_at' => now(), 'updated_at' => now()],

            // Subcategories of Home Decor
            ['name' => 'Furniture', 'department_id' => 8, 'parent_id' => 7, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lighting', 'department_id' => 8, 'parent_id' => 7, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kitchenware', 'department_id' => 8, 'parent_id' => 7, 'active' => true, 'created_at' => now(), 'updated_at' => now()],

            // Subcategories of Vehicles
            ['name' => 'Cars', 'department_id' => 11, 'parent_id' => 8, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Motorcycles', 'department_id' => 11, 'parent_id' => 8, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Trucks', 'department_id' => 11, 'parent_id' => 8, 'active' => true, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
