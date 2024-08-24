<?php

namespace Tests\Functional\Domain\Car\Repositories;

use App\Domain\Car\Models\Car;
use App\Domain\Car\Repositories\CarRepository;
use Tests\Functional\FunctionalTestCase;
use Tests\ModelBuilders\Car\CarBuilder;

final class CarRepositoryTest extends FunctionalTestCase
{
    private CarBuilder $carBuilder;

    private CarRepository $carRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->carRepository = $this->getService(CarRepository::class);
        $this->carBuilder = $this->getService(CarBuilder::class);
    }

    public function testGetAll(): void
    {
        $firstCar = $this->createCar();
        $secondCar = $this->createCar();

        $cars = $this->carRepository->findAll();

        $this->assertCount(2, $cars);
        $this->assertEquals($firstCar->Id, $cars->first()->Id);
        $this->assertEquals($secondCar->Id, $cars->last()->Id);
    }

    private function createCar(): Car
    {
        return $this->carBuilder->create()->getAndReset();
    }
}
