<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@admin.com')->get();
        if (!$user) {
            User::create([
                "name" => "Adminstrator",
                "email" => "admin@admin.com",
                "email_verified_at" => now(),
                "password" => bcrypt('adminpassword'),
                "role" => "admin"
            ]);
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(ProductSeeder::class);
    }
}
