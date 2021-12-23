<?php

namespace Hridoy\TermsAndConditions;

use Illuminate\Support\ServiceProvider;

class TermsAndConditionsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/terms_and_conditions.php' => config_path('terms_and_conditions.php')
        ], 'config');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/terms_and_conditions.php', 'terms_and_conditions'
        );
    }
}
