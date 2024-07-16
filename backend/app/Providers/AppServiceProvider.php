<?php

namespace App\Providers;

use App\Repositories\AreaRepository;
use App\Interfaces\AreaRepositoryInterface;
use App\Repositories\CustomerRepository;
use App\Interfaces\CustomerRepositoryInterface;
use App\Repositories\InformationRepository;
use App\Interfaces\InformationRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Interfaces\ProductRepositoryInterface;
use App\Repositories\SalesRepRepository;
use App\Interfaces\SalesRepRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AreaRepositoryInterface::class, AreaRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(InformationRepositoryInterface::class, InformationRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(SalesRepRepositoryInterface::class, SalesRepRepository::class);
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
