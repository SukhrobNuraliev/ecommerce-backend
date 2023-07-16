<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use App\Models\Stock;
use App\Models\UserAddress;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Order::class, 'order');
    }


    public function index(): JsonResponse
    {
        if (request()->has('status_id')){
            return $this->response(OrderResource::collection(
                auth()->user()->orders()->where('status_id', request('status_id'))->paginate(10)
            ));
        }

        return $this->response(OrderResource::collection(
            auth()->user()->orders()->paginate(10)
        ));

    }


    public function store(StoreOrderRequest $request): JsonResponse
    {
        $sum = 0;
        $products = [];
        $notFoundProducts = [];
        $address = UserAddress::find($request->address_id);
        $deliveryMethod = DeliveryMethod::findOrFail($request->delivery_method_id);

        foreach ($request['products'] as $requestProduct) {
            $product = Product::with('stocks')->findOrFail($requestProduct['product_id']);
            $product->quantity = $requestProduct['quantity'];

            if (
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

        if ($notFoundProducts === [] && $products !== [] && $sum !== 0) {

            $sum += $deliveryMethod->sum;

            $order = auth()->user()->orders()->create([
                'comment' => $request->comment,
                'delivery_method_id' => $request->delivery_method_id,
                'payment_type_id' => $request->payment_type_id,
                'sum' => $sum,
                'status_id' => in_array($request['payment_type_id'], [1, 2]) ? 1 : 10,
                'address' => $address,
                'products' => $products,
            ]);

            if ($order) {
                foreach ($products as $product) {
                    $stock = Stock::find($product['inventory'][0]['id']);
                    $stock->quantity -= $product['order_quantity'];
                    $stock->save();
                }
            }

            return $this->success('order created', $order);
        } else {
            return $this->error(
                'some products not found or does not have in inventory',
                ['not_found_products' => $notFoundProducts]
            );
        }

    }


    public function show(Order $order): JsonResponse
    {
        return $this->response(new OrderResource($order));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return 1;
    }
}
