<?php
Route::group(['namespace' => 'Resources\Customers'], function(){
    Route::get('/customers', 'CustomersController@index');
    Route::get('/customers/{id}', 'CustomersController@find')->name('customers-details');
});