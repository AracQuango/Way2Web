<?php

namespace Way2Web\Providers;

use Way2Web\Modules\Staff\Models\Role;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Silber\Bouncer\BouncerFacade as Bouncer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $mainPath = database_path('migrations');
        $moduleMigrationDirectories = glob(base_path('App/Modules') . "/*/Migrations", GLOB_ONLYDIR);
        $paths = array_merge([$mainPath], $moduleMigrationDirectories);
        $this->loadMigrationsFrom($paths);

        $moduleFactoryDirectories = glob(base_path('App/Modules') . "/*/Factories", GLOB_ONLYDIR);
        $this->loadFactoriesFrom($moduleFactoryDirectories);


    }

    protected function loadFactoriesFrom($paths) {
        foreach ($paths as $path) {
            $this->app->make(Factory::class)->load($path);
        }

    }
}
