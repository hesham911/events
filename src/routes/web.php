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
    Route::Post('dropzone','UploadsController@dropzone')->name('dropzone');
    Route::Post('delete/dropzone','UploadsController@deleteDropzone')->name('delete-dropzone');
    Route::get('get/countries/', 'MasterController@getCountries')->name('get-countries');
    Route::get('get/divisions/', 'MasterController@getDivisions')->name('get-divisions');
    /*  workshop Route */
    Route::group([
        'prefix'    => 'workshops'
    ],
        function(){
        Route::get('/', 'WorkshopsController@index');
        Route::get('show/{id}', 'WorkshopsController@show');
        Route::get('create', 'WorkshopsController@create');
        Route::post('create', 'WorkshopsController@store')->name('workshop-create');
        Route::get('edit/{id}', 'WorkshopsController@edit')->name('workshop-edit');
        Route::post('edit/{id}', 'WorkshopsController@update')->name('workshop-update');;
        Route::get('delete/{id}', 'WorkshopsController@delete')->name('workshop-delete');
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
        Route::get('edit/{id}', 'TrainersController@edit')->name('trainer-edit');
        Route::post('edit/{id}', 'TrainersController@update')->name('trainer-update');
        Route::get('delete/{id}', 'TrainersController@delete')->name('trainer-delete');
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
        Route::get('edit/{id}', 'CentersController@edit')->name('center-edit');
        Route::post('edit/{id}', 'CentersController@update')->name('center-update');
        Route::get('delete/{id}', 'CentersController@destroy')->name('center-delete');
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
