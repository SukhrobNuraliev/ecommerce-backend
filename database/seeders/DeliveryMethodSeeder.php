<?php

namespace Database\Seeders;

use App\Models\DeliveryMethod;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    public function run(): void
    {
        DeliveryMethod::create([
            'name' => [
                'uz' => 'Tekin',
                'ru' => 'Бесплатно',
            ],
            'estimated_time' => [
                'uz' => '5 kun',
                'ru' => 'ru 5 kun',
            ],
            'sum' => 0,
        ]);

        DeliveryMethod::create([
            'name' => [
                'uz' => 'Standart',
                'ru' => 'Standart',
            ],
            'estimated_time' => [
                'uz' => '3 kun',
                'ru' => 'ru 3 kun',
            ],
            'sum' => 40000,
        ]);

        DeliveryMethod::create([
            'name' => [
                'uz' => 'Tez',
                'ru' => 'ru Tez',
            ],
            'estimated_time' => [
                'uz' => '1 kun',
                'ru' => 'ru 1 kun',
            ],
            'sum' => 80000,
        ]);
    }
}
