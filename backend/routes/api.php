<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DeleteCustomerController;
use App\Http\Controllers\DeleteProductController;
use App\Http\Controllers\GetAreaController;
use App\Http\Controllers\GetInformationController;
use App\Http\Controllers\GetUserDealController;
use App\Http\Controllers\SetCustomerController;
use App\Http\Controllers\SetProductController;

Route::post('/deleteCustomer', DeleteCustomerController::class)->middleware('auth:sanctum');
Route::post('/deleteProduct', DeleteProductController::class)->middleware('auth:sanctum');
Route::post('/deleteProduct', DeleteProductController::class)->middleware('auth:sanctum');
Route::post('/getArea', GetAreaController::class)->middleware('auth:sanctum');
Route::post('/getInformation', GetInformationController::class)->middleware('auth:sanctum');
Route::post('/getUserDeal', GetUserDealController::class)->middleware('auth:sanctum');
Route::post('/login', LoginController::class);
Route::post('/setCustomer', SetCustomerController::class)->middleware('auth:sanctum');
Route::post('/setProduct', SetProductController::class)->middleware('auth:sanctum');
