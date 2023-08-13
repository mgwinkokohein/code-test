<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\MovieReview\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('moviereview/get', 'MovieReviewTableController')->name('moviereview.get');
            /*
             * User CRUD
             */
            Route::resource('moviereview', 'MovieReviewController');
});