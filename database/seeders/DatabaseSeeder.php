<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RoleTableSeeder::class);
        // $this->call(AdminUserSeeder::class);
        // $this->call(PaymentInstructionSeeder::class);
        // $this->call(PermissionSeeder::class);
         \App\Models\ViewCounter::factory(12)->create();
    }
}
