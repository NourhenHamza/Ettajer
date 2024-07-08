<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Overtrue\LaravelLang\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Contracts\Translation\Loader;

class LangServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Override the default translation loader
        $this->app->singleton('translation.loader', function ($app) {
            return new FileLoader($app['files'], $app['path.lang']);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
