<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/categories/{id}", function ($id) {
    $category = App\Models\Category::findOrFail($id);
    return new App\Http\Resources\CategoryResource($category);
});

Route::get("/categories", function () {
    $category = App\Models\Category::all();
    return App\Http\Resources\CategoryResource::collection($category);
});

Route::get("/categories-custom", function () {
    $category = App\Models\Category::all();
    return new App\Http\Resources\Custom\CategoryResourceCollection($category);
});

Route::get("/categories-custom-simple", function () {
    $category = App\Models\Category::all();
    return new App\Http\Resources\Custom\CategorySimpleResourceCollection($category);
});

Route::get('/products/{id}', function ($id) {
    $product = \App\Models\Product::find($id);
    return new App\Http\Resources\Product\ProductAllFieldResource($product);
});

Route::get("/products", function () {
    $products = App\Models\Product::all();
    return new App\Http\Resources\Product\Collection\ProductResourceCollection($products);
});

Route::get('/products-paging', function (Request $request) {
    $page = $request->get('page', 1);
    $products = \App\Models\Product::paginate(perPage: 2, page: $page);
    return new App\Http\Resources\Product\Collection\ProductResourceCollection($products);
});
