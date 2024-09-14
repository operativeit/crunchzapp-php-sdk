<?php

namespace CrunchzApp;

use Illuminate\Support\ServiceProvider;

class CrunchzAppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/crunchzapp.php' => config_path('crunchzapp.php')
        ], 'crunchzapp-config');
    }

    public function register(): void
    {
        $this->app->singleton(CrunchzApp::class, function () {
            return new CrunchzApp();
        });
    }
}
