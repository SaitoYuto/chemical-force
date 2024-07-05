<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddCustomerController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DeleteCustomerController;
use App\Http\Controllers\DeleteProductController;
use App\Http\Controllers\GetAreaController;
use App\Http\Controllers\GetCustomerController;
use App\Http\Controllers\GetInformationController;
use App\Http\Controllers\GetProductController;
use App\Http\Controllers\SetCustomerController;
use App\Http\Controllers\SetProductController;

Route::post('/addCustomer', AddCustomerController::class);
Route::post('/addProduct', AddProductController::class);
Route::post('/deleteCustomer', DeleteCustomerController::class)->middleware('auth:sanctum');
Route::post('/deleteProduct', DeleteProductController::class)->middleware('auth:sanctum');
Route::post('/deleteProduct', DeleteProductController::class)->middleware('auth:sanctum');
Route::post('/getArea', GetAreaController::class)->middleware('auth:sanctum');
Route::post('/getCustomer', GetCustomerController::class);
Route::post('/getInformation', GetInformationController::class)->middleware('auth:sanctum');
Route::post('/getProduct', GetProductController::class);
Route::post('/login', LoginController::class);
Route::post('/setCustomer', SetCustomerController::class)->middleware('auth:sanctum');
Route::post('/setProduct', SetProductController::class)->middleware('auth:sanctum');
