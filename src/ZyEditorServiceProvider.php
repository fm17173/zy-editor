<?php

namespace ZyEditor;

use Illuminate\Support\ServiceProvider;
use ZyEditor\Console\PublishCommand;
use ZyEditor\Core\FileSystem;


class ZyEditorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'zyeditor');
        $this->publishes([
            __DIR__ . '/../config/zyeditor.php' => config_path('zyeditor.php'),
            __DIR__ . '/../public/static' => public_path('zyeditor')
        ], 'zyeditor');
        $this->app->singleton('sys', function ($app) {
            return new FileSystem();
        });
        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');

        if ( $this->app->runningInConsole() ) {
            $commands = [PublishCommand::class];
            $this->commands($commands);
        }
    }
}
