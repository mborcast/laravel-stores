<?php
Route::group(['namespace' => 'Resources\Details'], function(){
    Route::get('/details', 'DetailsController@index');
});