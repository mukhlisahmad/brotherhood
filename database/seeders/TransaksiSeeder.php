<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;
class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaksi::factory()->create([
            'client_id' => '1',
            'product_id' => '1',
            'nama_product' => 'laptop',
            'price' => 'bungah',
        ]);
    }
}
