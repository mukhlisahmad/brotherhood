<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class WebSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\WebSettings::create([
            'email'       => 'ecommerce@gmail.com',
            'description' => 'ecommerce',
            'name'       => 'ecommerce',
            'no_telpon'  => '0087844372163',
            'logo'      => 'default.png',
            'header'    => 'tes',
        ]);
    }
}
