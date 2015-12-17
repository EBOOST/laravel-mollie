<?php

namespace Eboost\Mollie;

use Illuminate\Support\ServiceProvider;

class LaravelMollieServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/mollie.php';
        $this->publishes([$configPath => config_path('mollie.php')]);

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
