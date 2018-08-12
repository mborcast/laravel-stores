<?php
Route::group(['namespace' => 'Resources\Stores'], function(){
  // CREATE
  Route::get('/stores/create', 'StoresController@create')->name('stores-create');
  Route::post('/stores', 'StoresController@store')->name('stores-store');
  // READ
  Route::get('/stores', 'StoresController@index')->name('stores-index');
  Route::get('/stores/search', 'StoresController@search')->name('stores-search');
  Route::get('/stores/{id}', 'StoresController@find')->name('stores-about');
  Route::get('/stores/{id}/customers', 'StoresController@getCustomersIndex')->name('stores-customers');
  Route::get('/stores/{id}/sales', 'StoresController@getSalesIndex')->name('stores-sales');
  // UPDATE
  Route::get('/stores/{id}/edit', 'StoresController@edit')->name('stores-edit');
  Route::put('/stores/{id}', 'StoresController@update')->name('stores-update');
  // DELETE
  Route::delete('/stores/{id}', 'StoresController@destroy')->name('stores-destroy');
  Route::delete('/stores', 'StoresController@batchDestroy')->name('stores-batch-destroy');
});