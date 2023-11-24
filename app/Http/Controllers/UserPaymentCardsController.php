<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserPaymentCardResource;
use App\Models\UserPaymentCards;
use App\Http\Requests\StoreUserPaymentCardsRequest;
use App\Http\Requests\UpdateUserPaymentCardsRequest;
use App\Repositories\PaymentCardRepository;
use Illuminate\Support\Facades\Crypt;

class UserPaymentCardsController extends Controller
{
    public function __construct(
        protected PaymentCardRepository $cardRepository
    )
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return $this->response(UserPaymentCardResource::collection(auth()->user()->paymentCards));
    }



    public function store(StoreUserPaymentCardsRequest $request)
    {
        $this->cardRepository->savePaymentCard($request);

        return $this->success('card added');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserPaymentCards $userPaymentCards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPaymentCards $userPaymentCards)
    {
        //
    }
}
