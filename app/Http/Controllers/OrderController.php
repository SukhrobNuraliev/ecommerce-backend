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
use App\Repositories\OrderRepository;
use App\Repositories\StockRepository;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(
        protected OrderService   $orderService,
        protected ProductService $productService,
    )
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Order::class, 'order');
    }


    public function index(): JsonResponse
    {
        if (request()->has('status_id')) {
            return $this->response(OrderResource::collection(auth()->user()->orders()->where('status_id', request('status_id'))->paginate(10)));
        }

        return $this->response(OrderResource::collection(auth()->user()->orders()->paginate(10)));
    }


    public function store(StoreOrderRequest $request): JsonResponse
    {
        // o'zgaruvchilani belgilash
        list($sum, $products, $notFoundProducts, $address, $deliveryMethod) = $this->defineVariables($request);

        // omborda product bor yo'qligiga tekshirish
        list($sum, $products, $notFoundProducts) = $this->productService->checkForStock($request['products'], $sum, $products, $notFoundProducts);

        // bor bo'lsa buyurtma yaratish
        if ($notFoundProducts === [] && $products !== [] && $sum !== 0) {
            $order = $this->orderService->saveOrder($deliveryMethod, $sum, $request, $address, $products);
            return $this->success('order created', $order);
        }

        return $this->error('some products not found or does not have in inventory', ['not_found_products' => $notFoundProducts]);
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


    public function defineVariables(StoreOrderRequest $request): array
    {
        $sum = 0;
        $products = [];
        $notFoundProducts = [];
        $address = UserAddress::find($request->address_id);
        $deliveryMethod = DeliveryMethod::findOrFail($request->delivery_method_id);
        return array($sum, $products, $notFoundProducts, $address, $deliveryMethod);
    }
}
