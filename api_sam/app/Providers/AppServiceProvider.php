<?php

namespace App\Providers;

use App\Infrastructure\Persistence\Repository\InstituicaoRepository;
use App\Domain\Repository\InstituicaoRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InstituicaoRepositoryInterface::class, InstituicaoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
