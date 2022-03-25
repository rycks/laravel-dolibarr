<?php

namespace Caprel\Dolibarr;

use Illuminate\Support\ServiceProvider;
use Caprel\Dolibarr\Console\SearchDolibarr;
use Caprel\Dolibarr\Console\TestDolibarrPackage;

class DolibarrServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/dolibarr.php' => config_path('dolibarr.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__.'/../config/dolibarr.php', 'dolibarr');

        if ($this->app->runningInConsole()) {
            $this->commands([
                SearchDolibarr::class,
                TestDolibarrPackage::class,
            ]);
        }

    }

    public function register()
    {
        // $this->mergeConfigFrom(__DIR__ . '/../config/dolibarr.php', 'dolibarr');

        $this->app->singleton(Dolibarr::class);

        // $this->app->singleton('dolibarr', function () {
        //     return new Dolibarr;
        // });
    }
}
