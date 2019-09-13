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

        Route::get('index', 'EventsController@index');
});


Route::group(
    [
        'namespace' => 'S3geeks\Events\Http\Controllers\Frontend',
        'prefix'    => 'frontend'
    ], function (){

        Route::get('index', 'EventsController@index');
});
