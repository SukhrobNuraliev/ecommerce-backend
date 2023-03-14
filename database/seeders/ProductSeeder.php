<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory()->count(50)->create();

        foreach ($products as $product) {
            $product->stocks()->create([
                "quantity" => rand(1, 10),
                "attributes" => json_encode([
                    [
                        "attribute_id" => 1,
                        "value_id" => rand(1, 3)
                    ],
                    [
                        "attribute_id" => 2,
                        "value_id" => rand(4, 5)
                    ],
                ])
            ]);
        }
    }
}
