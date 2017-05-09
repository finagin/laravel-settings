<?php

namespace Finagin\Settings;

use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-settings.php' => config_path('/laravel-settings.php'),
        ], 'config');

        if (! class_exists('CreateSettingsTables')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__.'/../database/migrations/create_settings_tables.php.stub' => database_path("/migrations/{$timestamp}_create_settings_tables.php"),
            ], 'migrations');
        }

        $this->registerModelBindings();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-settings.php', 'laravel-settings');
    }

    protected function registerModelBindings()
    {
        $models = config('laravel-settings.models');

        foreach ($models as $model) {
            $this->app->bind($model['contractClass'], $model['modelClass']);
        }
    }
}
