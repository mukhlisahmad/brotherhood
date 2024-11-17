<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Client::create([
            'cli_email'       => 'client@gmail.com',
            'cli_alamat'       => 'almaat nya',
            'cli_name'       => 'client',
            'cli_no_telpon'      => '085625161462',
            'cli_code'      => '345t',
            'password'    => 'bebasbang22',
        ]);
        \App\Models\Client::create([
            'cli_email'       => 'client1@gmail.com',
            'cli_alamat'       => 'almaat nya',
            'cli_name'       => 'client1',
            'cli_no_telpon'      => '085625161463',
            'cli_code'      => '365t',
            'password'    => 'bebasbang22',
        ]);
    }
}
