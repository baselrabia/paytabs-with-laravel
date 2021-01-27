<?php

namespace Basel\Paytabs;

use Illuminate\Support\ServiceProvider;

class PaytabsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->mergeConfigFrom(
            __DIR__ . '/config/paytabs.php',
            'paytabs'
        );
        $this->publishes([
            __DIR__ . '/config/paytabs.php' => config_path('paytabs.php'),
            __DIR__ . '/Models/PaytabsInvoice.php' => app_path('Models/PaytabsInvoice.php'),
            __DIR__ . '/Http/Controllers/PaytabsController.php' => app_path('Http/Controllers/PaytabsController.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Paytabs', function() {
			return Paytabs::getInstance();
	    });
    }
}
