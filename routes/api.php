<?php

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

//Route::get('/hello_json', function (Request $request) {
//    return ['hello' => "world"];
//});
//
//Route::post('/tokens/create', function (Request $request) {
//    var_dump($request->user());
////
////    $token = $request->user()->createToken($request->token_name);
////    return ['token' => $token->plainTextToken];
//});

Route::get('/who/am/i',function (Request $request){
    return [
        'name'=>$request->user()->name,
        'tokens'=> json_encode($request->user()->tokens,true)
    ];
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//curl 'http://localhost/api/who/am/i' -H 'Authorization: Bearer 1|d6WQx0Ua3iV4a5cc7bPyDVkcKzuSXeR14tCPmZIf'
