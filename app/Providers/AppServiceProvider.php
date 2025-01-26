<?php

namespace App\Providers;

use Core\Auth\Domain\AuthServiceInterface;
use Core\Auth\Domain\UserRepositoryInterface;
use Core\Auth\Infrastructure\AuthService;
use Core\Auth\Infrastructure\UserRepository;
use Core\Competition\Domain\CompetitionServiceInterface;
use Core\Competition\Infrastructure\Adapters\CompetitionAdapter;
use Core\Team\Domain\TeamServiceInterface;
use Core\Team\Infrastructure\Adapters\TeamAdapter;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CompetitionServiceInterface::class, CompetitionAdapter::class);
        $this->app->bind(TeamServiceInterface::class, TeamAdapter::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Passport::rou
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}
