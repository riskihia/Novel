<?php

namespace App\Providers;

use App\Services\Impl\NovelServiceImpl;
use App\Services\NovelService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class NovelServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
        NovelService::class => NovelServiceImpl::class
    ];
    public function provides():array
    {
        return [NovelService::class];
    }


    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
