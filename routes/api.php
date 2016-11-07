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


    // |||| Informações de endereço |||
    $api->get('paises', function(){
        return \App\Pais::all();
    });

    $api->get('paises/estados', function(){
        return \App\Pais::with('estados')->get();
    });

    $api->get('paises/{id}', function($id){
        return \App\Pais::findOrFail($id);
    });


    $api->get('estados', function(){
        return \App\Estado::all();
    });

    $api->get('estados/{id}', function($id){
        return \App\Estado::findOrFail($id);
    });

    $api->get('cidades', function(){
        return \App\Cidade::all();
    });

    $api->get('cidades/{id}', function($id){
        return \App\Cidade::findOrFail($id);
    });

    // alias to estados/cidades
    $api->get('cidades/estado/{id}', function($id){
        return \App\Cidade::where('estado_id', $id)->get();
    });
});

