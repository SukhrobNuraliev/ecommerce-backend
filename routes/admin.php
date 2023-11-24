<?php

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;



Route::prefix('stats')->group(function () {
    Route::get('orders-count', [StatsController::class, 'ordersCount']);
    Route::get('orders-sales-sum', [StatsController::class, 'ordersSalesSum']);
    Route::get('orders-count-by-days', [StatsController::class, 'ordersCountByDays']);
    Route::get('delivery-methods-ratio', [StatsController::class, 'deliveryMethodsRatio']);
});


Route::apiResource('orders', AdminOrderController::class);
