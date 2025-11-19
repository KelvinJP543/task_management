<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;

class TaskManagementSeeder extends Seeder // PASTI HARUS INI
{
    public function run(): void
    {
        // 1. Buat 1 admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Buat 2 regular users
        $user1 = User::create([
            'name' => 'User 1',
            'email' => 'user1@test.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        $user2 = User::create([
            'name' => 'User 2',
            'email' => 'user2@test.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        // 3. Buat 10 sample tasks dengan berbagai status
        Task::factory()->count(5)->create(['user_id' => $admin->id, 'status' => 'pending']);
        Task::factory()->count(3)->create(['user_id' => $user1->id, 'status' => 'in_progress']);
        Task::factory()->count(2)->create(['user_id' => $user2->id, 'status' => 'completed']);
    }
}