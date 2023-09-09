<?php

namespace App\Providers;

use App\Services\Impl\RequestServiceImpl;
use App\Services\RequestService;
use Illuminate\Support\ServiceProvider;

class RequestServiceProvider extends ServiceProvider
{
    public array $singletons = [
        RequestService::class => RequestServiceImpl::class
    ];
    public function provides():array
    {
        return [RequestService::class];
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
