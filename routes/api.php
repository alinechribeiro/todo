<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ListsController;
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

Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{lists_id}', [ItemController::class, 'parentIndex']);

Route::prefix('/item')->group(function(){
    Route::post('/store',[ItemController::class, 'store']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});

Route::get('/tasks', [ListsController::class, 'index']);

Route::prefix('/task')->group(function(){
    Route::post('/store',[ListsController::class, 'store']);
    Route::put('/{id}', [ListsController::class, 'update']);
    Route::delete('/{id}', [ListsController::class, 'destroy']);
});