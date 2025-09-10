<?php

namespace Robert\Poz;

use Illuminate\Support\ServiceProvider;

class PozServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // Merge config dari package ke Laravel config
        $this->mergeConfigFrom(__DIR__ . '/../config/poz.php', 'poz');

        // Bind Core class ke container
        $this->app->singleton('poz', function ($app) {
            return new Core();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // // Load routes jika ada
        // if (file_exists(__DIR__ . '/../routes/web.php')) {
        //     $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        // }

        // // Load migrations jika ada
        // if (is_dir(__DIR__ . '/../database/migrations')) {
        //     $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // }

        // // Publish config ke folder modules
        // $this->publishes([
        //     __DIR__ . '/../config/poz.php' => base_path('modules/Poz/config/poz.php'),
        // ], 'poz-config');

        // // Publish routes ke folder modules
        // $this->publishes([
        //     __DIR__ . '/../routes/web.php' => base_path('modules/Poz/Routes/web.php'),
        // ], 'poz-routes');

        // // Publish migrations ke folder modules
        // $this->publishes([
        //     __DIR__ . '/../database/migrations/' => base_path('modules/Poz/Database/Migrations'),
        // ], 'poz-migrations');
    }
}
