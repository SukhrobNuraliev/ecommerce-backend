<?php

namespace App\Http\Controllers;

use App\Models\Value;
use App\Http\Requests\StoreValueRequest;
use App\Http\Requests\UpdateValueRequest;

class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreValueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Value $value)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Value $value)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateValueRequest $request, Value $value)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Value $value)
    {
        //
    }
}
