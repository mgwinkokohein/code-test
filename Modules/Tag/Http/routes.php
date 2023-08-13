<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Tag\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('tag/get', 'TagTableController')->name('tag.get');
            /*
             * User CRUD
             */
            Route::resource('tag', 'TagController');
});