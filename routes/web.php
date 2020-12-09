<?php

use Illuminate\Support\Facades\Route;

// O cliente deve possuir as opções básicas de uma API REST
// o [/clientes][POST] Cadastro do cliente.
// o [/clientes][GET] Listagem de clientes.
// o [/clientes/:idCliente][GET] Listagem de um cliente específico.
// o [/clientes/:idCliente][PUT] Alteração do cliente.
// o [/clientes/:idCliente][DELETE] Exclusão do cliente.

// • Assim como as funções básicas do cliente, os endereços também devem possuir:
// o [/clientes/:idCliente/enderecos][POST] Cadastro de endereços do cliente.
// o [/clientes/:idCliente/enderecos][GET] Listagem de endereços do cliente.
// o [/clientes/:idCliente/enderecos/:idEndereco][GET] Listagem de um endereço
// específico do cliente.
// o [/clientes/:idCliente/enderecos/:idEndereco][PUT] Alteração de um endereço.
// o [/clientes/:idCliente/enderecos/:idEndereco][DELETE] Exclusão de um endereço.

//PATHS


const CLIENTS = '/clientes';
const ADDRESSES = '/clientes/{client_id}/enderecos';


//CLIENTES
Route::get(CLIENTS,'ClientController@index')->name('client.index');
Route::post(CLIENTS,'ClientController@store')->name('client.store');
Route::get(CLIENTS . '/{id}', 'ClientController@show')->name('client.show');
Route::put(CLIENTS . '/{id}', 'ClientController@update')->name('client.put');
Route::delete(CLIENTS . '/{id}', 'ClientController@destroy')->name('client.delete');

//ENDERECOS
Route::get(ADDRESSES,'AddressController@index')->name('address.index');
Route::post(ADDRESSES,'AddressController@store')->name('address.store');
Route::get(ADDRESSES . '/{adress_id}', 'AddressController@show')->name('address.show');
Route::put(ADDRESSES . '/{address_id}', 'AddressController@update')->name('address.put');
Route::delete(ADDRESSES . '/{address_id}', 'AddressController@destroy')->name('address.delete');


Route::get('/', function () {

    echo '<h1><a href="https://github.com/lightguardian/client-adresses/blob/master/README.md" target="_blank">Utilização</a></h1>';

});
