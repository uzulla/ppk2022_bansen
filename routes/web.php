<?php

use App\Http\Controllers\IncrementBansenController;
use App\Http\Controllers\LatestBansenController;
use Illuminate\Http\JsonResponse as JsonResponseAlias;
use Illuminate\Http\Request;
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

Route::get('/', LatestBansenController::class);

Route::get('/b', function () {
    return view('b');
});

Route::get('/some', function (Request $request) {
    $name = $request->input('name');
    return new JsonResponseAlias(['test'=>'data', 'name'=>$name]);
});

Route::get('/latest_bansen', LatestBansenController::class)->name('latest_bansen');

Route::get('/increment_bansen', IncrementBansenController::class);


