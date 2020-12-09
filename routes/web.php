<?php

use Illuminate\Support\Facades\Route;

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
