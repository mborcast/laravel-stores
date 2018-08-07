<?php
Route::group(['namespace' => 'Resources\Sales'], function(){
    Route::get('/stores', 'SalesController@index');
});