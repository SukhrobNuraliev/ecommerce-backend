<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Database\Eloquent\Collection;

class CategoryController extends Controller
{
    public function index()
    {
        return $this->response(Category::all());
    }


    public function store(StoreCategoryRequest $request)
    {
        //
    }

    public function show(Category $category)
    {
        return $this->response(new CategoryResource($category));
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
