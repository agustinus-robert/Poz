<?php

namespace Poz;

use Illuminate\Support\ServiceProvider;

class PozServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Merge config
        $this->mergeConfigFrom(__DIR__.'/../config/poz.php', 'poz');
        
        // Bind core class ke container
        $this->app->singleton('poz', function ($app) {
            return new Core();
        });
    }

    public function boot()
    {
        // Load routes
        if (file_exists(__DIR__.'/../routes/web.php')) {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        }

        // Load migrations
        if (is_dir(__DIR__.'/../database/migrations')) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }

        // Publish config
        $this->publishes([
            __DIR__.'/../config/poz.php' => config_path('poz.php'),
        ], 'config');
    }
}
