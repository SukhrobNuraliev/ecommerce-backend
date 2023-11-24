<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminOrderController extends Controller
{
    protected OrderRepository $orderRepository;

    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->orderRepository = app(OrderRepository::class);
    }

    public function index(Request $request)
    {
        Gate::authorize('order:viewAny');

        $orders = $this->orderRepository->getAll($request);

        return OrderResource::collection($orders);
    }
}
