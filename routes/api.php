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