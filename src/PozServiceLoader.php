<?php

namespace Robert\Poz;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Router;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class PozServiceLoader extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Bootstrap the application services.
     */
    public function boot(Router $router, Filesystem $filesystem)
    {
        // TBC: BS or TW mode, setting on config
        $this->loadViewsFrom(__DIR__.'/../src/Resources/views', 'view-poz');
        $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
    }
}