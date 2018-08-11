<?php
Route::group(['namespace' => 'Resources\Stores'], function(){
    Route::get('/stores', 'StoresController@index')->name('stores-index');
    Route::get('/stores/{id}', 'StoresController@find')->name('stores-details');
    Route::get('/stores/{id}/customers', 'StoresController@getCustomersIndex')->name('stores-customers');
    Route::get('/stores/{id}/sales', 'StoresController@getSalesIndex')->name('stores-sales');
});