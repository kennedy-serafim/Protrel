<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CompanyRepository::class, \App\Repositories\CompanyRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ContestRepository::class, \App\Repositories\ContestRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\EmployeeRepository::class, \App\Repositories\EmployeeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\FinancialProposalRepository::class, \App\Repositories\FinancialProposalRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\InsuranceRepository::class, \App\Repositories\InsuranceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductTagRepository::class, \App\Repositories\ProductTagRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SupplierRepository::class, \App\Repositories\SupplierRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\WarrantyRepository::class, \App\Repositories\WarrantyRepositoryEloquent::class);
        //:end-bindings:
    }
}
