<?php

use App\Http\Controllers\ArticleCategoriesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TemanController;
use App\Http\Controllers\UtangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.dashboard', [
        'title' => 'Dashboard'
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/teman', [TemanController::class, 'index'])->name('teman.page');
Route::get('/utang', [UtangController::class, 'index'])->name('utang.page');
Route::get('/teman/json', [TemanController::class, 'dataTeman'])->name('teman.list');

Route::get('/utang/json', [UtangController::class, 'dataUtang'])->name('utang.list');


require __DIR__ . '/auth.php';
