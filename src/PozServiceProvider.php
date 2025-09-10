<?php

namespace Robert\Poz;

use App\Models\Position;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Robert\Poz\AuthServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Robert\Poz\RouteServiceProvider;
use Modules\Account\Models\Employee;
use Modules\Account\Models\EmployeePosition;
use Modules\Account\Models\User;

class PozServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Poz';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'poz';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/' . $this->moduleNameLower . '.php',
            $this->moduleNameLower
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->loadDynamicRelationships();
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');


        $this->loadViewsFrom(__DIR__ . '/Resources/Views', $this->moduleNameLower);
        $this->loadViewsFrom(__DIR__ . '/Resources/Components', 'x-' . $this->moduleNameLower);

        $livewirePath = __DIR__ . '/Http/Livewire';
        $namespace = 'Robert\\Poz\\Http\\Livewire';

        if (File::exists($livewirePath)) {
            $files = File::allFiles($livewirePath);

            foreach ($files as $file) {
                $relativePath = str_replace($livewirePath . DIRECTORY_SEPARATOR, '', $file->getPathname());
                $relativePath = str_replace('.php', '', $relativePath);
                $class = $namespace . '\\' . str_replace('/', '\\', $relativePath);

                if (class_exists($class)) {
                    $relativeNamespace = str_replace($namespace . '\\', '', $class);
                    $parts = explode('\\', $relativeNamespace);
                    $componentName = 'poz::' . implode('.', array_map(fn($part) => Str::kebab($part), $parts));
                    Livewire::component($componentName, $class);
                }
            }
        }

        Blade::componentNamespace('Robert\\' . $this->moduleName . '\\Resources\\Components', $this->moduleNameLower);
    }

    /**
     * Register dynamic relationships.
     */
    public function loadDynamicRelationships()
    {
        // User::resolveRelationUsing('employee', function ($user) {
        //     return $user->hasOne(Employee::class, 'user_id')->withDefault();
        // });

        // Position::resolveRelationUsing('employees', function ($position) {
        //     return $position->belongsToMany(Employee::class, 'empl_positions', 'position_id', 'empl_id')->withPivot('id');
        // });

        // Position::resolveRelationUsing('employeePositions', function ($position) {
        //     return $position->hasMany(EmployeePosition::class, 'position_id');
        // });
    }
}
