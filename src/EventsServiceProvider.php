<?php
/**
 * Created by PhpStorm.
 * User: Hanafawy
 * Date: 9/13/2019
 * Time: 02:41 AM
 */
namespace S3geeks\Events;

use Illuminate\Support\ServiceProvider;


Class EventsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__. '/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views/Admin', 'adminEvents');
        $this->loadViewsFrom(__DIR__.'/views/Frontend', 'frontendEvents');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');

        $this->publishes([
            __DIR__.'/views/Admin' => resource_path('views/vendor/Admin/adminEvents'),
            __DIR__.'/views/Frontend' => resource_path('views/vendor/Frontend/frontendEvents'),
        ]);
    }

    public function register()
    {

    }
}