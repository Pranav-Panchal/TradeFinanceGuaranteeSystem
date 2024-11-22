<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\GuaranteeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Bind the GuaranteeRepository to the container
        $this->app->bind(GuaranteeRepository::class, function ($app) {
            return new GuaranteeRepository();
        });
    }

    public function boot()
    {
        //
    }
}
