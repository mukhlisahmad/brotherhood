<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WebSettings;
class WebSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        WebSettings::factory()->create([
            'email'       => 'brotherhood@gmail.com',
            'description' => 'brotherhood',
            'name'       => 'brotherhood',
            'no_telpon'  => '0087844372163',
            'logo'      => 'default.png',
            'header'    => 'tes',
        ]);
    }
}
