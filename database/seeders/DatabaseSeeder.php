<?php

namespace Database\Seeders;

use App\Models\Instance;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt(Str::random(10)),
        ]);

        // Instance::factory()
        //     ->has(Report::factory()->count(2))
        //     ->count(20)
        //     ->create();
    }
}
