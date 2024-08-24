<?php

namespace App\Providers\Domain\Car;

use Illuminate\Support\ServiceProvider;

final class CarProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Car\Contracts\CarRepository::class,
            \App\Domain\Car\Repositories\CarRepository::class,
        );
    }
}
