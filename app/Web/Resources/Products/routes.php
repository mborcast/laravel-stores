<?php
Route::group(['namespace' => 'Resources\Products'], function(){
    // CREATE
    Route::get('/products/create', 'ProductsController@create')->name('products-create');
    Route::post('/products', 'ProductsController@store')->name('products-store');
    // READ
    Route::get('/products', 'ProductsController@index')->name('products-index');
    Route::get('/products/search', 'ProductsController@search')->name('products-search');
    Route::get('/products/{id}', 'ProductsController@find')->name('products-about');
    Route::get('/products/{id}/sales', 'ProductsController@getSalesIndex')->name('products-sales');
    // UPDATE
    Route::get('/products/{id}/edit', 'ProductsController@edit')->name('products-edit');
    Route::put('/products/{id}', 'ProductsController@update')->name('products-update');
    // DELETE
    Route::delete('/products/{id}', 'ProductsController@destroy')->name('products-destroy');
});