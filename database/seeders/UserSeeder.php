<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User || Customer
        User::factory()->create([
            'name'=> 'user',
            'email'=>"user@example.com"

        ])->assignRole(RolesEnum::User->value);

        //Vendor || Buyer
        User::factory()->create([
            'name'=> 'vendor',
            'email'=>"vendor@example.com"

        ])->assignRole(RolesEnum::Vendor->value);

        //Admin
        User::factory()->create([
            'name'=> 'admin',
            'email'=>"admin@example.com"

        ])->assignRole(RolesEnum::Admin->value);

    }
}
