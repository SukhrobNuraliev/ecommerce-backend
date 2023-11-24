<?php

namespace App\Repositories;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderRepository extends Repository
{

    public function getAll(Request $request)
    {
        $orders = Order::query();

        if ($request->has('user_id'))
            $orders->where('user_id', $request->user_id);
        if ($request->has('delivery_method_id'))
            $orders->where('delivery_method_id', $request->delivery_method_id);
        if ($request->has('payment_type_id'))
            $orders->where('payment_type_id', $request->payment_type_id);
        if ($request->has('sum_from') && $request->has('sum_to'))
            $orders->whereBetween('sum', [$request->sum_from, $request->sum_to]);
        if ($request->has('created_at'))
            $orders->whereBetween('created_at', [Carbon::parse($request->created_at)->startOfDay(), Carbon::parse($request->created_at)->endOfDay()]);
        if ($request->has('from') && $request->has('to'))
            $orders->whereBetween('created_at', [$request->from, Carbon::parse($request->to)->endOfDay()]);
        /* TODO implement text column search */
        //if ($request->has('region')){}
        if ($request->has('order_by'))
            $orders->orderBy($request->order_by);

        return $orders->paginate($request->paginate ?? 20);
    }


    public function createOrder(StoreOrderRequest $request, mixed $sum, $address, array $products)
    {
        return auth()->user()->orders()->create([
            'comment' => $request->comment,
            'delivery_method_id' => $request->delivery_method_id,
            'payment_type_id' => $request->payment_type_id,
            'sum' => $sum,
            'status_id' => in_array($request['payment_type_id'], [1, 2]) ? 1 : 10,
            'address' => $address,
            'products' => $products,
        ]);
    }

}
