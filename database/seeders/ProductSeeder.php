<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create([
            'name'       => 'Laptop',
            'description'       => 'laptop apik BGT',
            'alamat'       => 'almaat nya',
            'stok'       => '2000',
            'code'      => '345t',
        ]);
        \App\Models\Product::create([
            'name'       => 'hp',
            'description'  => 'hp apik BGT',
            'alamat'       => 'almaat nya',
            'stok'       => '100',
            'code'      => '335t',
        ]);
    }
}
