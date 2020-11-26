<?php

namespace Programic\Tasks;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class TaskServiceProvider extends ServiceProvider
{
    public function boot(Filesystem $filesystem)
    {
        $this->setup();

        $this->commands([
            Commands\MakeTaskCommand::class,
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Tasks::class, function ($app) {
            return new Tasks($app);
        });

        $this->app->alias(Tasks::class, 'tasks');
    }

    private function setup()
    {
        // Load migrations from "Task" folder
        $path = 'tasks';
        if(!File::isDirectory(base_path() . '/' . $path)){
            File::makeDirectory($path, 0755, true, true);
        }
        $this->loadMigrationsFrom($path);
    }
}
