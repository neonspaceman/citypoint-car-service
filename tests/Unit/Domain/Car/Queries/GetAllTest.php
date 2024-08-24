<?php

namespace Tests\Unit\Domain\Car\Queries;

use App\Domain\Car\Contracts\CarRepository;
use App\Domain\Car\Models\Car;
use App\Domain\Car\Queries\GetAll;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\Unit\UnitTestCase;

final class GetAllTest extends UnitTestCase
{
    public function testHandle(): void
    {
        $car = $this->createCar();

        $cars = (new GetAll())->handle($this->createRepository([$car]));

        $this->assertCount(1, $cars);
        $this->assertEquals($car, $cars[0]);
    }

    /**
     * @param array<Car> $cars
     */
    private function createRepository(array $cars): CarRepository
    {
        $repository = $this->createMock(CarRepository::class);
        $repository
            ->expects($this->once())
            ->method('findAll')
            ->willReturn(new LengthAwarePaginator($cars, 1, 25));

        return $repository;
    }

    private function createCar(): Car
    {
        $car = new Car([
            'RegNumber' => 'Test RegNumber',
            'VIN' => 'Test VIN',
            'Model' => 'Test Model',
            'Brand' => 'Test Brand',
        ]);
        $car->Id = 1;

        return $car;
    }
}
