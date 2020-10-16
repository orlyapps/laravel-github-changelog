<?php

namespace Orlyapps\LaravelGithubChangelog;

use Illuminate\Support\ServiceProvider;

class LaravelGithubChangelogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-github-changelog');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'github-changelog');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('github-changelog.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/laravel-github-changelog'),
            ], 'views');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-github-changelog'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-github-changelog'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'github-changelog');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-github-changelog', function () {
            return new LaravelGithubChangelog;
        });
    }
}
