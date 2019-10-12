<?php
/**
 * Created by PhpStorm.
 * User: Hanafawy
 * Date: 9/13/2019
 * Time: 02:52 AM
 */


Route::group(
    [
        'namespace' => 'S3geeks\Events\Http\Controllers\Admin',
        'prefix'    => 'admin'
    ], function (){

        /*  Event Route */
        Route::group([
            'prefix'    => 'events'
        ],function(){
            Route::get('/', 'EventsController@index');
            Route::get('event/{id}', 'EventsController@show');
            Route::get('event/create', 'EventsController@create');
            Route::post('event/create', 'EventsController@store');
            Route::get('event/edit/{id}', 'EventsController@edit');
            Route::post('event/edit/{id}', 'EventsController@update');
            Route::post('event/delete/{id}', 'EventsController@delete');
        });

    /*  Trainer Route */
    Route::group([
        'prefix'    => 'trainers'
    ],function(){
        Route::get('/', 'EventsController@index');
        Route::get('trainer/{id}', 'TrainersController@show');
        Route::get('trainer/create', 'TrainersController@create');
        Route::post('trainer/create', 'TrainersController@store');
        Route::get('trainer/edit/{id}', 'TrainersController@edit');
        Route::post('trainer/edit/{id}', 'TrainersController@update');
        Route::post('trainer/delete/{id}', 'TrainersController@delete');
    });

    /*  workshop Route */
    Route::group([
        'prefix'    => 'workshops'
    ],function(){
        Route::get('/', 'EventsController@index');
        Route::get('workshop/{id}', 'WorkshopsController@show');
        Route::get('workshop/create', 'WorkshopsController@create');
        Route::post('workshop/create', 'WorkshopsController@store');
        Route::get('workshop/edit/{id}', 'WorkshopsController@edit');
        Route::post('workshop/edit/{id}', 'WorkshopsController@update');
        Route::post('workshop/delete/{id}', 'WorkshopsController@delete');
    });
});


Route::group(
    [
        'namespace' => 'S3geeks\Events\Http\Controllers\Frontend',
        'prefix'    => 'frontend'
    ], function (){

        Route::get('index', 'EventsController@index');
});
