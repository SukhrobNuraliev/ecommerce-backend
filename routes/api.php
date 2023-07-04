<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCardTypeController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewContoller;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserPaymentCardsController;
use App\Http\Controllers\UserSettingController;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class, 'register']);
Route::post('change-password', [AuthController::class, 'changePassword']);
Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');

Route::apiResources([
    'categories' => CategoryController::class,
    'categories.products' => CategoryProductController::class,
    'statuses' => StatusController::class,
    'statuses.orders' => StatusOrderController::class,
    'favorites' => FavoriteController::class,
    'products' => ProductController::class,
    'orders' => OrderController::class,
    'delivery-methods' => DeliveryMethodController::class,
    'payment-types' => PaymentTypeController::class,
    'user-addresses' => UserAddressController::class,
    'reviews' => ReviewController::class,
    'products.reviews' => ProductReviewContoller::class,
    'settings' => SettingController::class,
    'user-settings' => UserSettingController::class,
    'payment-card-types' => PaymentCardTypeController::class,
    'user-payment-cards' => UserPaymentCardsController::class,
]);

Route::get('test', function () {
    $creditN = '12/34';

    $enc = \Illuminate\Support\Facades\Crypt::encrypt($creditN);

    $dec = \Illuminate\Support\Facades\Crypt::decrypt($enc);

    dd($enc);
});
