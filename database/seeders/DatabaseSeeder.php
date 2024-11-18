<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'no_telpon' => '08733566526',
            'email' => 'admin@gmail.com',
            'alamat' => 'bungah',
            'password' => Hash::make('bebasbrow22'),
        ]);
    }
}
