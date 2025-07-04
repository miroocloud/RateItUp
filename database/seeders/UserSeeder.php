<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'administrator']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@rateitup.com',
            'password' => Hash::make('AdminHadir#0118'),
            'role_id' => $adminRole->id,
            'email_verified_at' => now(),
        ]);

        // Regular user
        User::create([
            'name' => 'Karina',
            'email' => 'karina@rateitup.com',
            'password' => Hash::make('karinaAespo#0198'),
            'role_id' => $userRole->id,
            'email_verified_at' => now(),
        ]);

        // Regular user
        User::create([
            'name' => 'Nayeon',
            'email' => 'dubu@rateitup.com',
            'password' => Hash::make('imNayeon#1088'),
            'role_id' => $userRole->id,
            'email_verified_at' => now(),
        ]);

        // Create additional test users
        User::factory(10)->create([
            'role_id' => $userRole->id,
        ]);
    }
}
