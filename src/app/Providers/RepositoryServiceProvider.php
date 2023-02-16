<?php

namespace App\Providers;

use App\Repositories\Contract\FileCardRepositoryContract;
use App\Repositories\Eloquent\FileCardRepository;
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
        $this->app->bind(FileCardRepositoryContract::class, FileCardRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
