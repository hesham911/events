<?php
/**
 * Created by PhpStorm.
 * User: Hanafawy
 * Date: 9/13/2019
 * Time: 02:52 AM
 */


Route::group(
    [
        'namespace'     => 'S3geeks\Events\Http\Controllers\Admin',
        'prefix'        => 'admin',
        'middleware'        => ['web','auth'],
    ],
    function (){

    /*  workshop Route */
    Route::group([
        'prefix'    => 'workshops'
    ],
        function(){
        Route::get('/', 'WorkshopsController@index');
        Route::get('show/{id}', 'WorkshopsController@show');
        Route::get('create', 'WorkshopsController@create');
        Route::post('create', 'WorkshopsController@store')->name('eventCreate');
        Route::get('edit/{id}', 'WorkshopsController@edit');
        Route::post('edit/{id}', 'WorkshopsController@update');
        Route::post('delete/{id}', 'WorkshopsController@delete');
        Route::get('get/centers/', 'WorkshopsController@getCenters');
        Route::get('get/trainers/', 'WorkshopsController@getTrainers');
        Route::get('get/countries/', 'WorkshopsController@getCountries');
        Route::get('get/divisions/', 'WorkshopsController@getDivisions');
    });

    /*  Trainer Route */
    Route::group([
        'prefix'    => 'trainers'
    ],
        function(){
        Route::get('/', 'TrainersController@index');
        Route::get('show/{id}', 'TrainersController@show');
        Route::get('create', 'TrainersController@create');
        Route::post('create', 'TrainersController@store')->name('trainer-create');
        Route::get('edit/{id}', 'TrainersController@edit');
        Route::post('edit/{id}', 'TrainersController@update');
        Route::post('delete/{id}', 'TrainersController@delete');
        Route::get('get/countries/', 'TrainersController@getCountries');
        Route::get('get/divisions/', 'TrainersController@getDivisions');
    });

    /*  centers Route */
    Route::group([
        'prefix'    => 'centers'
    ],
        function(){
        Route::get('/', 'CentersController@index');
        Route::get('show/{id}', 'CentersController@show');
        Route::get('create', 'CentersController@create');
        Route::post('create', 'CentersController@store')->name('center-create');
        Route::get('edit/{id}', 'CentersController@edit');
        Route::post('edit/{id}', 'CentersController@update');
        Route::post('delete/{id}', 'CentersController@delete');
        Route::get('get/countries/', 'CentersController@getCountries');
        Route::get('get/divisions/', 'CentersController@getDivisions');
    });
});


Route::group(
    [
        'namespace' => 'S3geeks\Events\Http\Controllers\Frontend',
        'prefix'    => 'frontend',
        'middleware'        => 'web',
    ], function (){

        Route::get('index', 'WorkshopsController@index');
});
