<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageUrl = ('web/img/logo.jpg');

        Setting::create(['key' => 'app_name', 'value' => 'MedicAI']);
        Setting::create(['key' => 'app_logo', 'value' => $imageUrl]);
        Setting::create(['key' => 'company_name', 'value' => 'MedicAI']);
        Setting::create(['key' => 'current_currency', 'value' => 'BDT']);
        Setting::create(['key' => 'hospital_address', 'value' => '16/A Mission Garden, United City']);
        Setting::create(['key' => 'hospital_email', 'value' => 'medicai@gmail.com']);
        Setting::create(['key' => 'hospital_phone', 'value' => '01568922406']);
        Setting::create(['key' => 'hospital_from_day', 'value' => 'sat to thu']);
        Setting::create(['key' => 'hospital_from_time', 'value' => '9 AM to 11 PM']);
    }
}
