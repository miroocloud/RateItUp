<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'administrator']);
        Role::firstOrCreate(['name' => 'user']);
        Role::firstOrCreate(['name' => 'moderator']);
    }
}
