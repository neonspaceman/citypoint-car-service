<?php

namespace App\Domain\Car\Repositories;

use App\Domain\Car\Models\Car;
use Illuminate\Pagination\LengthAwarePaginator;

final class CarRepository implements \App\Domain\Car\Contracts\CarRepository
{
    public function findAll(): LengthAwarePaginator
    {
        return Car::query()->paginate();
    }
}
