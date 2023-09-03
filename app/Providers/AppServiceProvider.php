<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TagService;
use TagServiceImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        // $this->app->singleton(TagService::class, function(){
        //     return new TagServiceImpl();
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        
    }

    // public $singetons = [
    //     TagService::class => TagServiceImpl::class,
    // ];
}
