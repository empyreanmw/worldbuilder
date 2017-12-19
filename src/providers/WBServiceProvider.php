<?php

namespace empyrean\worldbuilder\providers;

use Illuminate\Support\ServiceProvider;
use empyrean\worldbuilder\commands\build;
use empyrean\worldbuilder\factoryList;
use empyrean\worldbuilder\builder;

class WBServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('wb.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
               build::class
            ]);
        }
    }

    public function register()
    {
        $this->registerFactoryList();
        $this->registerBuilder();
    }

    protected function registerFactoryList()
    {
        $this->app->singleton('wb.factoryList', function ($app, $userInput) {
            $factoryList = new factoryList(
               config('wb.factoryPath'),
               $userInput
            );

            return $factoryList->selectMethod();
        });
    }

    protected function registerBuilder()
    {
        $this->app->singleton('wb.builder', function ($app, $userInput){
            $builder = new builder(
                $app->makeWith('wb.factoryList', $userInput),
                config('wb.models')
            );

            return $builder;
        });
    }
}