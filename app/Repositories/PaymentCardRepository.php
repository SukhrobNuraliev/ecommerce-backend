<?php

namespace App\Repositories;

use App\Http\Requests\StoreUserPaymentCardsRequest;

class PaymentCardRepository extends Repository
{
    public function savePaymentCard(StoreUserPaymentCardsRequest $request): void
    {
        auth()->user()->paymentCards()->create([
            "name" => encrypt($request->name),
            "number" => encrypt($request->number),
            "exp_date" => encrypt($request->exp_date),
            "holder_name" => encrypt($request->holder_name),
            "last_four_numbers" => encrypt(substr($request->number, -4)),
            "payment_card_type_id" => $request->payment_card_type_id,
        ]);
    }
}
