<?php
Route::group(['namespace' => 'Resources\Sales'], function(){    // CREATE
  Route::get('/sales/create', 'SalesController@create')->name('sales-create');
  Route::post('/sales', 'SalesController@store')->name('sales-store');
  // READ
  Route::get('/sales', 'SalesController@index')->name('sales-index');
  Route::get('/sales/{id}', 'SalesController@find')->name('sales-about');
  Route::get('/sales/{id}/sales', 'SalesController@getSalesIndex')->name('sales-sales');
  // UPDATE
  Route::get('/sales/{id}/edit', 'SalesController@edit')->name('sales-edit');
  Route::put('/sales/{id}', 'SalesController@update')->name('sales-update');
  // DELETE
  Route::delete('/sales/{id}', 'SalesController@destroy')->name('sales-destroy');
});