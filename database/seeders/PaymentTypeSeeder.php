<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    public function run(): void
    {
        PaymentType::create([
            'name' => [
                'uz' => 'Naxt',
                'ru' => 'Наличные'
            ]
        ]);
        PaymentType::create([
            'name' => [
                'uz' => 'Terminal',
                'ru' => 'Terminal'
            ]
        ]);
        PaymentType::create([
            'name' => [
                'uz' => 'Click',
                'ru' => 'Click'
            ]
        ]);
        PaymentType::create([
            'name' => [
                'uz' => 'Payme',
                'ru' => 'Payme'
            ]
        ]);
        PaymentType::create([
            'name' => [
                'uz' => 'Uzum',
                'ru' => 'Uzum'
            ]
        ]);
    }
}
