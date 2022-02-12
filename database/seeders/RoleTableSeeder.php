<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'website_admin'
        ]);
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'deliverer'
        ]);
        Role::create([
            'name' => 'shopkeeper'
        ]);
        Role::create([
            'name' => 'customer'
        ]);
    }
}
