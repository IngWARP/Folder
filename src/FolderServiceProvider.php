<?php

namespace IngWARP\Folder;

use Illuminate\Support\ServiceProvider;

class FolderServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/Http/routes.php';
        }

        $this->loadViewsFrom(__DIR__.'/resources/views', 'folder');
        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views')
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //include __DIR__.'/Http/routes.php';
        //$this->app->make('IngWARP\folder\Http\FolderController');
        $this->app->bind('folder',function($app){
            return new Folder;
        });
    }
}

class Folder
{
    public function hello()
    {
        return 'hello';
    }
}
