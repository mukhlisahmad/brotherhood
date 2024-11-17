<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Toko::create([
            'tko_email'       => 'toko@gmail.com',
            'tko_description'       => 'Toko Amanah jaya sentosa',
            'tko_alamat'       => 'almaat nya',
            'tko_name'       => 'client',
            'tko_no_telpon'      => '085625161462',
            'tko_code'      => '345t',
            'password'    => 'bebasbang22',
        ]);
        \App\Models\Toko::create([
            'tko_email'       => 'toko1@gmail.com',
            'tko_description'       => 'Toko ya',
            'tko_alamat'       => 'almaat nya',
            'tko_name'       => 'client1',
            'tko_no_telpon'      => '08562516134',
            'tko_code'      => '343t',
            'password'    => 'bebasbang22',
        ]);
    }
}
