<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        User::create([
            "name" => "Adminstrator",
            "email" => "admin@admin.com",
            "email_verified_at" => now(),
            "password" => bcrypt('adminpassword'),
            "role" => "admin"
        ]);
    }
};
