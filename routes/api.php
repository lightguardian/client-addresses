<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// PATHS

const CLIENTS = 'clientes';
const ADDRESSES = 'clientes/{client_id}/enderecos';

Route::get(CLIENTS,'Api\\ClientController@index')->name('client.index');
Route::post(CLIENTS,'Api\\ClientController@store')->name('client.store');
Route::get(CLIENTS . '/{id}', 'Api\\ClientController@show')->name('client.show');
Route::put(CLIENTS . '/{id}', 'Api\\ClientController@update')->name('client.put');
Route::delete(CLIENTS . '/{id}', 'Api\\ClientController@destroy')->name('client.delete');

// ENDERECOS
Route::get(ADDRESSES,'Api\\AddressController@index')->name('address.index');
Route::post(ADDRESSES,'Api\\AddressController@store')->name('address.store');
Route::get(ADDRESSES . '/{adress_id}', 'Api\\AddressController@show')->name('address.show');
Route::put(ADDRESSES . '/{address_id}', 'Api\\AddressController@update')->name('address.put');
Route::delete(ADDRESSES . '/{address_id}', 'Api\\AddressController@destroy')->name('address.delete');


Route::get('/', function () {

    echo '<h1><a href="https://github.com/lightguardian/client-adresses/blob/master/README.md" target="_blank">Descrição</a></h1>';

});

