<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'f_name' => 'John',
            'm_name' => 'Doe',
            'l_name' => 'Smith',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'email_verified' => false,
            'role' => 'ADMINISTATOR',
            'position_id' => 1,
            'department_id' => 1,
            'company_id' => 1,
            'created_by' => 'SYSTEM',
            'updated_by' => 'SYSTEM',
            'is_deleted' => 0,
            'deleted_by' => null,
        ]);
    }
}
