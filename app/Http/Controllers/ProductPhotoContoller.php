<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductPhotoRequest;
use App\Models\Photo;
use App\Models\Product;
use App\Services\FileService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductPhotoContoller extends Controller
{
    public function __construct(
        protected FileService $fileService,
    )
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Product $product)
    {
        return $this->response($product->photos);
    }

    public function store(StoreProductPhotoRequest $request, Product $product)
    {
        $this->fileService->saveProductPhotos($request, $product);

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
