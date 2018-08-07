<?php
Route::group(['namespace' => 'Resources\Products'], function(){
    Route::get('/products', 'ProductsController@index');
});