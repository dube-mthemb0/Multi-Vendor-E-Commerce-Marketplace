<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Books & Stationery', 'slug' => Str::slug('books-stationery'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Clothing & Apparel', 'slug' => Str::slug('clothing-apparel'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Construction & Hardware Supplies', 'slug' => Str::slug('construction-hardware-supplies'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Electronic Goods', 'slug' => Str::slug('electronic-goods'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Farming Supplies', 'slug' => Str::slug('farming-supplies'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Food & Groceries', 'slug' => Str::slug('food-groceries'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Health & Beauty', 'slug' => Str::slug('health-beauty'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Home & Garden', 'slug' => Str::slug('home-garden'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Industrial and Office Supplies', 'slug' => Str::slug('industrial-office-supplies'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Motor Spares & Accessories', 'slug' => Str::slug('motor-spares-accessories'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Motor Vehicles', 'slug' => Str::slug('motor-vehicles'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Promotions', 'slug' => Str::slug('promotions'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Real Estate', 'slug' => Str::slug('real-estate'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sports, Hobbies & Leisure', 'slug' => Str::slug('sports-hobbies-leisure'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Trades & Services', 'slug' => Str::slug('trades-services'), 'active' => true, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('departments')->insert($departments);
    }
}
