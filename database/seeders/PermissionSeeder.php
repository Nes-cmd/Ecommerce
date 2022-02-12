<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()    
    {   
        Permission::create(['permission_name' => 'allow-all']);
        Permission::create(['permission_name' => 'upload-product']);
        Permission::create(['permission_name' => 'update-product']);
        Permission::create(['permission_name' => 'update-price']);
        Permission::create(['permission_name' => 'delete-product']);
        Permission::create(['permission_name' => 'check-orders']);
    }
}
