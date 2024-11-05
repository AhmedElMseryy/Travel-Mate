<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate(['id' => '1'], [
            'facebook' => 'Ahmed Elmsery',
            'linkedin' => 'Ahmed Elmsery',
            'twitter' => 'Ahmed Elmsery',
            'Google' => 'ahmed131@gmail.com',
            'Github' => 'AhmedElmsery',
        ]);
    }
}
