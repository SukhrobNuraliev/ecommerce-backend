<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductService extends Service
{
    public function checkForStock($products1, mixed $sum, array $products, array $notFoundProducts): array
    {
        foreach ($products1 as $requestProduct) {
            $product = Product::with('stocks')->findOrFail($requestProduct['product_id']);
            $product->quantity = $requestProduct['quantity'];

            if (
                /* tekshirish product omborda bormi */
                $product->stocks()->find($requestProduct['stock_id']) &&
                $product->stocks()->find($requestProduct['stock_id'])->quantity >= $requestProduct['quantity']
            ) {
                $productWithStock = $product->withStock($requestProduct['stock_id']);
                $productResource = (new ProductResource($productWithStock))->resolve();

                $sum += $productResource['discounted_price'] ?? $productResource['price'];
                $sum += $productWithStock->stocks[0]->added_price;
                $products[] = $productResource;
            } else {
                $requestProduct['we_have'] = $product->stocks()->find($requestProduct['stock_id'])->quantity;
                $notFoundProducts[] = $requestProduct;
            }
        }
        return array($sum, $products, $notFoundProducts);
    }
}
