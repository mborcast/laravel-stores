<?php
Route::group(['namespace' => 'Resources\Customers'], function(){
  // CREATE
  Route::get('/customers/create', 'CustomersController@create')->name('customers-create');
  Route::post('/customers', 'CustomersController@store')->name('customers-store');
  // READ
  Route::get('/customers', 'CustomersController@index')->name('customers-index');
  Route::get('/customers/search', 'CustomersController@search')->name('customers-search');
  Route::get('/customers/{id}', 'CustomersController@find')->name('customers-about');
  Route::get('/customers/{id}/sales', 'CustomersController@getSalesIndex')->name('customers-sales');
  // UPDATE
  Route::get('/customers/{id}/edit', 'CustomersController@edit')->name('customers-edit');
  Route::put('/customers/{id}', 'CustomersController@update')->name('customers-update');
  // DELETE
  Route::delete('/customers/{id}', 'CustomersController@destroy')->name('customers-destroy');
});