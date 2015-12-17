<?php

namespace Eboost\Mollie;

use Illuminate\Support\ServiceProvider;

class LaravelMollieServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/mollie.php' => config_path('mollie.php'),
        ], 'config');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/mollie.php', 'mollie'
        );

        $this->app['mollie'] = $this->app->share(function ($app) {
            $config = $app['config']->get('mollie');

            return new MollieApiClientManager($app, $config);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('mollie');
    }
}
