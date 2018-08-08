<?php
Route::group(['namespace' => 'Resources\Stores'], function(){
    Route::get('/stores', 'StoresController@index')->name('stores-index');
    Route::get('/stores/{id}', 'StoresController@find')->name('stores-details');
});