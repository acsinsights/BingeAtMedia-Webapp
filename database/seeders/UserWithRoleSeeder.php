<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserWithRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_role = Role::firstOrCreate(['name' => 'admin']);
        $admin_user =  User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
        ]);
        $admin_user->assignRole($admin_role);
    }
}
