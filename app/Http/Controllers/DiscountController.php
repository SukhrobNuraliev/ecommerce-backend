<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;

class DiscountController extends Controller
{
    public function index()
    {
        return $this->response(Discount::all());
    }


    public function store(StoreDiscountRequest $request)
    {
        if (Discount::query()->where('product_id', $request->product_id)->exists()){
            return $this->error('discount already exists in this product');
        }

        $discount = Discount::create($request->validated());

        return $this->success('discount created', $discount);
    }


    public function show(Discount $discount)
    {
        //
    }


    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        $discount->update($request->validated());

        return $this->success('discount updated');
    }


    public function destroy(Discount $discount)
    {
        $discount->delete();

        return $this->success('discount deleted');
    }
}
