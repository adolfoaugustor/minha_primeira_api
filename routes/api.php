<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function (Request $request) {
    //dd($request->headers->all());

    $response = new \Illuminate\Http\Response(json_encode(['msg' => 'Minha primeira api']));
    $response->header('Content-Type', 'application/json');
    
    return $response;
});

Route::namespace('Api')->group(function () {
    
    Route::get('/products', 'ProductController@index');

});