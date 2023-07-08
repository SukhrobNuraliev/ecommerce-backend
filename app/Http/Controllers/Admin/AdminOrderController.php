<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request)
    {
        Gate::authorize('order:viewAny');

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


        return OrderResource::collection($orders->paginate($request->paginate ?? 20));
    }
}
