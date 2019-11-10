<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Validator::extend('dash2', function ($attrinute, $value, $parameters, $validator){
//            dd($attrinute, $value, $parameters, $validator);
//        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind('App\Services\MinhaClasse', function($app){
//            return new \App\Services\MinhaClasse('768686t6t8r76ftc879g890g87');
//        });
//        $this->app->bind(
//            'App\Repositories\Interfaces\TaskRepositoryInterface',
//            'App\Repositories\Implementations\TaskRepository'
//        );
        $this->app->bind(
            'App\Repositories\Interfaces\TaskRepositoryInterface',
            'App\Repositories\Implementations\EloquentTaskRepository'
        );
    }
}
