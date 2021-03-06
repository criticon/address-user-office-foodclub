<?php

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

Route::get('/', 'AddressController@index');

Route::resource('address', 'AddressController', ['only' => ['index', 'store', 'destroy']]);

Route::get('address/{address_id}/delete', ['as' => 'address.delete', 'uses' => 'AddressController@destroy']);
