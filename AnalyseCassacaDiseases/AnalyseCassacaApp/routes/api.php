<?php

use App\Http\Controllers\api\DetectionController;
use App\Http\Controllers\api\private\CategoryController;
use App\Http\Controllers\api\private\ImageController;
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

Route::post('/detect', [DetectionController::class, 'detect']);
Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/categories/{name}/images', [CategoryController::class, 'getCategoryImagesByName']);
Route::get('/images/{id}', [ImageController::class, 'getImageDetails']);
