<?php namespace IngWARP\Folder;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class FolderServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // use this if your package has views
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'folder');

        // use this if your package has routes
        $this->setupRoutes($this->app->router);

        // use this if your package needs a config file
        $this->publishes([
            __DIR__.'/config/folder.php' => config_path('folder.php'),
        ]);

        $this->publishes([
            __DIR__.'/resources/assets/js' => public_path('js')
        ]);
        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(
            __DIR__.'/config/folder.php', 'folder'
        );
    }
    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'IngWARP\folder\Http\Controllers'], function($router)
        {
            require __DIR__.'/Http/routes.php';
        });
    }
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFolder();

        // use this if your package has a config file
        config([
            'config/folder.php',
        ]);
    }
    private function registerFolder()
    {
        $this->app->bind('folder',function($app){
            return new Folder($app);
        });
    }
}
