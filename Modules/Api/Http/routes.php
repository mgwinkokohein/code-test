<?php
use Modules\Api\Http\Controllers\ApiController;

Route::group(['middleware' => ['api'], 'as' => 'api.', 'prefix' => 'api', 'namespace' => 'Modules\Api\Http\Controllers'], function()
{
    		Route::get('test', function () {
                return 'hello';
            });
    Route::post('signup', [ApiController::class,'signup']);
    Route::post('login', [ApiController::class,'login']);
    Route::get('all-movies', [ApiController::class,'allMovies']);
    Route::post('movie/review/{id}', [ApiController::class,'review']);
    Route::get('movies', [ApiController::class,'filter']);


    Route::group(['middleware' => ['auth:api']] , function() {
        Route::get('profile', [ApiController::class,'profile']);
        Route::post('logout', [ApiController::class,'logout']);
        Route::post('movie/create', [ApiController::class,'createMovie']);
        Route::post('movie/edit/{id}', [ApiController::class,'updateMovie']);
        Route::delete('movie/delete/{id}', [ApiController::class,'destoryMovie']);
        Route::get('movie/list', [ApiController::class,'movieLists']);
        
        
        Route::get('movies/export', [ApiController::class, 'exportFilteredMovies']);
    });
});