<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    public function run(): void
    {
        User::find(2)->addresses()->create([
            "latitude" => "41.310014",
            "longitude" => "69.280742",
            "region" => "Tashkent",
            "district" => "Mirabad Tuman",
            "street" => "Mingurik Mahallah",
            "home" => "777",
        ]);

        User::find(2)->addresses()->create([
            "latitude" => "41.310014",
            "longitude" => "69.280742",
            "region" => "Tashkent",
            "district" => "Mirzo. U Tuman",
            "street" => "Navbahor Mahallah",
            "home" => "123",
        ]);
    }
}
