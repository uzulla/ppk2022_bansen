<?php

use App\Http\Controllers\IncrementBansenController;
use App\Http\Controllers\LatestBansenController;
use App\Http\Controllers\PingMeController;
use App\Http\Controllers\PostIncrementBansenController;
use App\Http\Middleware\AddSomeTextMiddleware;
use Illuminate\Http\JsonResponse;
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

Route::get('/', LatestBansenController::class)->name('top');

Route::post('/post_bansen_increment', PostIncrementBansenController::class)->name('bansen_increment');

Route::get('/b', function () {
    return view('b');
});

Route::get('/some', function (Request $request) {
    $name = $request->input('name');
    return new JsonResponse(['test' => 'data', 'name' => $name]);
});

Route::get('/latest_bansen', LatestBansenController::class)->name('latest_bansen');

Route::get('/increment_bansen', IncrementBansenController::class);

Route::get('/token/issue', function (Request $request) {
    $token = $request->user()->createToken("test_token");
    return ['token' => $token->plainTextToken];
})->middleware(['auth']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/hello/{name}', function (Request $request, string $name) {
    var_dump($name);
    var_dump(get_class($request));
    return $name;
})->where(['name' => '[0-9]+']);

Route::name('prefix.')
    ->prefix('prefix')
    ->middleware(AddSomeTextMiddleware::class)
    ->group(function () {
        Route::get('/hello', function () {
            var_dump(route('prefix.hello_route'));
            return "prefixed hello";
        })->name('hello_route');

        Route::get('/greet', function () {
            return "prefixed greet";
        })->name('greet');
    });

Route::name('notification_test.')
    ->prefix('notify')
    ->group(function () {
        Route::get('/me', PingMeController::class);
    });

require __DIR__ . '/auth.php';
