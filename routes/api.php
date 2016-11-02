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

//used to disable CORS
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::resource('veiculos', 'VeiculoAPIController');


//config for dingo
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function($api){

    $api->resource('users', 'App\Http\Controllers\API\UserAPIController');

    $api->resource('clientes', 'App\Http\Controllers\API\ClienteAPIController');
    $api->resource('veiculos', 'App\Http\Controllers\API\VeiculoAPIController');
});

