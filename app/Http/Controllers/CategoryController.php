<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends BaseController
{
    public function store(Request $request){
        $data=$request->validate(['name'=>'required']);

        $category=Category::Create(['name'=>$data['name']]);

        return $this->sendResponse($category,201);
    }

    public function update(Category $category,Request $request){
        $data=$request->validate(['name'=>'required']);

        $category=Category::findOrFail($category->id);

        $category->update(['name'=>$data['name']]);


        return $this->sendResponse(new CategoryResource($category),200);
    }

    public function getCategoryProducts(Category $category){
        $products=$category->products()->get();

        return $this->sendResponse(new ProductCollection($products),200);
    }
}
