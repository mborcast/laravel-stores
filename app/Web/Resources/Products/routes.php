<?php
Route::group(['namespace' => 'Resources\Products'], function(){
    Route::get('/products', 'ProductsController@index');
    Route::get('/products/{id}', 'ProductsController@find')->name('products-details');
});