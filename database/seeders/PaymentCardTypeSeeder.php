<?php

namespace Database\Seeders;

use App\Models\PaymentCardType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentCardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentCardType::create([
            'name' => 'Uzcard',
            'code' => 'uzcard',
            'icon' => 'uzcard',
        ]);
        PaymentCardType::create([
            'name' => 'Humo',
            'code' => 'humo',
            'icon' => 'humo',
        ]);
        PaymentCardType::create([
            'name' => 'Visa',
            'code' => 'visa',
            'icon' => 'visa',
        ]);
    }
}
