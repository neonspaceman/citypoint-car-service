<?php

namespace App\Domain\Car\Queries;

use App\Domain\Car\Contracts\CarRepository;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetAll
{
    use Dispatchable;

    public function handle(CarRepository $carRepository): LengthAwarePaginator
    {
        return $carRepository->findAll();
    }
}
