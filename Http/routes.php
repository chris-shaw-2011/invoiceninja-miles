<?php

Route::group(['middleware' => ['web', 'lookup:user', 'auth:user'], 'namespace' => 'Modules\Miles\Http\Controllers'], function()
{
    Route::resource('miles', 'MilesController');
    Route::post('miles/bulk', 'MilesController@bulk');
    Route::get('api/miles', 'MilesController@datatable');
});

Route::group(['middleware' => 'api', 'namespace' => 'Modules\Miles\Http\ApiControllers', 'prefix' => 'api/v1'], function()
{
    Route::resource('miles', 'MilesApiController');
});
