<?php
Route::group(['namespace' => 'Resources\Customers'], function(){
    Route::get('/customers', 'CustomersController@index');
});