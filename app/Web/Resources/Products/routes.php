<?php
Route::group(['namespace' => 'Resources\Products'], function(){
    Route::get('/', 'ProductsController@index');
});