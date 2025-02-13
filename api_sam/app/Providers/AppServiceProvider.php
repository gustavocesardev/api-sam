<?php

namespace App\Providers;

use App\Domain\Repository\CursoRepositoryInterface;
use App\Infrastructure\Persistence\Repository\CursoRepository;
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
        $this->app->bind(CursoRepositoryInterface::class, CursoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
