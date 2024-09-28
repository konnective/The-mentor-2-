<?php

use App\Http\Controllers\api\ContactApiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('products', [ProductController::class, 'getProducts']);
Route::get('create', [BlogController::class, 'up']);

//api
Route::post('newsletter', [ContactApiController::class, 'newsletter']);
Route::post('contact', [ContactApiController::class, 'contact']);

Route::post('/view', [function () {
    $res = ["sucess" => true];
    return response()->json($res);
}]);
