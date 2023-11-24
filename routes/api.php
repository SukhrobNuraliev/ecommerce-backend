<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentCardTypeController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPhotoContoller;
use App\Http\Controllers\ProductReviewContoller;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPaymentCardsController;
use App\Http\Controllers\UserPhotoController;
use App\Http\Controllers\UserSettingController;
use Illuminate\Support\Facades\Route;

Route::post('roles/assign', [RoleController::class, 'assign']);
Route::post('permissions/assign', [PermissionController::class, 'assign']);
Route::get('products/{product}/related', [ProductController::class, 'related']);



Route::apiResources([
    'users' => UserController::class,
    'roles' => RoleController::class,
    'photos' => PhotoController::class,
    'orders' => OrderController::class,
    'reviews' => ReviewController::class,
    'statuses' => StatusController::class,
    'products' => ProductController::class,
    'settings' => SettingController::class,
    'discounts' => DiscountController::class,
    'favorites' => FavoriteController::class,
    'categories' => CategoryController::class,
    'permissions' => PermissionController::class,
    'users.photos' => UserPhotoController::class,
    'user-settings' => UserSettingController::class,
    'payment-types' => PaymentTypeController::class,
    'user-addresses' => UserAddressController::class,
    'statuses.orders' => StatusOrderController::class,
    'products.photos' => ProductPhotoContoller::class,
    'products.reviews' => ProductReviewContoller::class,
    'delivery-methods' => DeliveryMethodController::class,
    'payment-card-types' => PaymentCardTypeController::class,
    'categories.products' => CategoryProductController::class,
    'user-payment-cards' => UserPaymentCardsController::class,
]);
