<?php 

namespace Pichicacax\LaravelJSRoute;

use Illuminate\Support\ServiceProvider;
use Pichicacax\LaravelJsRoute\Command as JsRouteCommand;

class LaravelJSRouteServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
       //
    }

    /**
     * Register the service provider.
     *
     * @return void
     * @author My Oliveros <moliveros@i4asiacorp.com>
     */
    public function register()
    {
        $this->app->singleton('routes.js', function ($app) {
            return new JsRouteCommand;
        });

        $this->commands('routes.js');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     * @author My Oliveros <moliveros@i4asiacorp.com>
     */
    public function provides()
    {
        return ['routes.js'];
    }
}
