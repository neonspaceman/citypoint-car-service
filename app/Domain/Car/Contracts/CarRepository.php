<?php

namespace App\Domain\Car\Contracts;

use Illuminate\Pagination\LengthAwarePaginator;

interface CarRepository
{
    public function findAll(): LengthAwarePaginator;
}
