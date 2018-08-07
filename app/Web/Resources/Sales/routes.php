<?php
Route::group(['namespace' => 'Resources\Sales'], function(){
    Route::get('/sales', 'SalesController@index');
});