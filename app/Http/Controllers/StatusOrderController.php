<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeOrderStatusRequest;
use App\Models\Order;
use App\Models\Status;

class StatusOrderController extends Controller
{
    public function store(Status $status, ChangeOrderStatusRequest $request)
    {
        $order = Order::findOrFail($request['order_id']);

        $order->update(['status_id' => $status->id]);

        return response(['success' => true, 'message' => 'status changed']);
    }
}
