<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductPhotoRequest;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductPhotoContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Product $product)
    {
        return $this->response($product->photos);
    }

    public function store(StoreProductPhotoRequest $request, Product $product)
    {
        foreach ($request->photos as $photo) {
            $path = $photo->store('products/'.$product->id, 'public');
            $fullName = $photo->getClientOriginalName();

            $product->photos()->create([
                'full_name' => $fullName,
                'path' => $path
            ]);
        }

        return $this->success('photos added');
    }


    public function destroy(Product $product, Photo $photo)
    {
        Gate::authorize('product:destroy');

        Storage::delete($photo->path);
        $photo->delete();

        return $this->success('photo deleted');
    }
}
