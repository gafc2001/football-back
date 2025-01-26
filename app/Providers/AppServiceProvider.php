<?php

namespace App\Providers;

use Core\Competition\Domain\CompetitionServiceInterface;
use Core\Competition\Infrastructure\Adapters\CompetitionAdapter;
use Core\Team\Domain\TeamServiceInterface;
use Core\Team\Infrastructure\Adapters\TeamAdapter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CompetitionServiceInterface::class, CompetitionAdapter::class);
        $this->app->bind(TeamServiceInterface::class, TeamAdapter::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
