<?php

namespace Database\Seeders; // Ini penting untuk namespace

use Illuminate\Database\Seeder;
use Database\Seeders\TaskManagementSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            TaskManagementSeeder::class, 
        ]);
    }
}