<?php
Route::group(['namespace' => 'Resources\Stores'], function(){
    Route::get('/stores', 'StoresController@index');
});