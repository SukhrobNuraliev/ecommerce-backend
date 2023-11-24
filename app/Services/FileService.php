<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreProductPhotoRequest;
use App\Models\Product;

class FileService extends Service
{
    public function checkUserPhoto(RegisterRequest $request, $user): void
    {
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('users/' . $user->id, 'public');
            $user->photos()->create([
                'full_name' => $request->file('photo')->getClientOriginalName(),
                'path' => $path,
            ]);
        }
    }


    public function saveProductPhotos(StoreProductPhotoRequest $request, Product $product): void
    {
        foreach ($request->photos as $photo) {
            $path = $photo->store('products/' . $product->id, 'public');
            $fullName = $photo->getClientOriginalName();

            $product->photos()->create([
                'full_name' => $fullName,
                'path' => $path
            ]);
        }
    }
}
