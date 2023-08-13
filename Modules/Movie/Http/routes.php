<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Movie\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('movie/get', 'MovieTableController')->name('movie.get');
            /*
             * User CRUD
             */
            Route::resource('movie', 'MovieController');
});