<?php

namespace Database\Seeders;

use App\Enums\SettingType;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = Setting::create([
            'name' => [
                'uz' => 'Til',
                'ru' => 'Language'
            ],
            'type' => SettingType::SELECT->value,
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => 'Ozbekcha',
                'ru' => 'Ozbekcha',
            ]
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => 'Ruscha',
                'ru' => 'Ruscha',
            ]
        ]);


        $setting = Setting::create([
            'name' => [
                'uz' => 'Pul birligi',
                'ru' => 'Pul birligi'
            ],
            'type' => SettingType::SELECT->value,
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => 'So\'m',
                'ru' => 'Sum',
            ]
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => 'Dollar',
                'ru' => 'Dollar',
            ]
        ]);

        $setting = Setting::create([
            'name' => [
                'uz' => 'Dark Mode',
                'ru' => 'Dark Mode ru'
            ],
            'type' => SettingType::SWITCH->value,
        ]);

        $setting = Setting::create([
            'name' => [
                'uz' => 'Xabarnomalar',
                'ru' => 'Xabarnomalar ru'
            ],
            'type' => SettingType::SWITCH->value,
        ]);
    }
}
