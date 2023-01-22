<?php

use App\Http\Controllers\Api\ApiTemanController;
use App\Http\Controllers\Api\ApiUtangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('teman', ApiTemanController::class);
Route::apiResource('utang', ApiUtangController::class);
Route::get('/search-teman/{nama}', [ApiTemanController::class, 'search'])->name('teman.find');
Route::get('/search-utang/{id}', [ApiUtangController::class, 'search'])->name('utang.find');