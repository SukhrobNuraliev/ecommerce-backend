<?php

namespace App\Http\Controllers;

use App\Models\PaymentCardType;
use App\Http\Requests\StorePaymentCardTypeRequest;
use App\Http\Requests\UpdatePaymentCardTypeRequest;

class PaymentCardTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->response(PaymentCardType::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentCardTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentCardType $paymentCardType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentCardType $paymentCardType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentCardTypeRequest $request, PaymentCardType $paymentCardType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentCardType $paymentCardType)
    {
        //
    }
}
