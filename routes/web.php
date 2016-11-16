<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

//página inicial do cliente
Route::get('/cliente-panel', function (){
    return view('cliente-panel');
});

Route::resource('users', 'UserController');

Route::resource('veiculos', 'VeiculoController');

Route::resource('clientes', 'ClienteController');

Route::resource('solicitacoes', 'SolicitacaoController');

Route::get('solicitacoes/cliente/{cliente}', 'SolicitacaoController@cadastrar')->name('solicitacoes.cadastrar');

Route::get('solicitacoes/contrato/{solicitacao}', 'SolicitacaoController@contrato')->name('solicitacoes.contrato');
Route::get('locacoes/contrato/{locacao}', 'LocacaoController@contrato')->name('locacoes.contrato');

Route::resource('locacoes', 'LocacaoController');
Route::post('locacoes/aprovar/{solicitacao}', 'LocacaoController@aprovar')->name('locacoes.aprovar');


//teste para criar form

Route::get('form', function(){
    return view('form');
});