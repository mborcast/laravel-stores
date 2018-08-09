<?php
Route::group(['namespace' => 'Resources\Sales'], function(){
    Route::get('/sales', 'SalesController@index');
    Route::get('/sales/{id}', 'SalesController@find')->name('sales-details');
});