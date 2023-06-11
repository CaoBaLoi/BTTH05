<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix("baiviet")->group(function () {
    Route::get("/", [ArticleController::class, "index"])->name('baiviet.index');
    Route::get("/{ma_bviet}/edit", [ArticleController::class, "update"])->name('baiviet.edit');
    Route::put("/{ma_bviet}", [ArticleController::class, "update"])->name('baiviet.update');
    Route::post("/create", [ArticleController::class, "store"])->name('baiviet.store');
    Route::get("/create", [ArticleController::class, "create"]);
    Route::delete("/{ma_bviet}", [ArticleController::class, "destroy"])->name('destroy');
});