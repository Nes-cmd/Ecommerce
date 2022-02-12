<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Website administrtator seeder
        $web_admin = Role::where('name', 'website_admin')->first()->id;
        User::create([
            'name' => 'Website Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role_id' =>  $web_admin,
        ]);

        //Business or product administrtator seeder
        $product_admin = Role::where('name', 'admin')->first()->id;
        User::create([
            'name' => 'Product',
            'email' => 'webadmin@admin.com',
            'password' => Hash::make('password'),
            'role_id' =>  $product_admin,
        ]);

        //Business or product administrtator whose role can be controlled by product admin
        $shopkeeper = Role::where('name', 'shopkeeper')->first()->id;
        User::create([
            'name' => 'Shopkeeper',
            'email' => 'shop1@admin.com',
            'password' => Hash::make('password'),
            'role_id' =>  $shopkeeper,
        ]);
        
        User::create([
            'name' => 'Shopkeeper 2',
            'email' => 'shop2@admin.com',
            'password' => Hash::make('password'),
            'role_id' =>  $shopkeeper,
        ]);
        
    }
}
