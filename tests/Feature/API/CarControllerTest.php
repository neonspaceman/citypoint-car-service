<?php

namespace Tests\Feature\API;

use App\Domain\Car\Models\Car;
use Tests\Feature\FeatureTestCase;
use Tests\ModelBuilders\Car\CarBuilder;

final class CarControllerTest extends FeatureTestCase
{
    private CarBuilder $carBuilder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->carBuilder = $this->getService(CarBuilder::class);
    }

    public function testGetList(): void
    {
        $car = $this->createCar();

        $response = $this->get('/api/cars');

        $jsonResponse = $response->json();

        $this->assertArrayHasKey('meta', $jsonResponse);
        $this->assertArrayHasKey('data', $jsonResponse);
        $this->assertArrayHasKey('links', $jsonResponse);

        $this->assertPaginationMetaData($jsonResponse['meta']);
        $this->assertPaginationLinksData($jsonResponse['links']);

        $this->assertArrayHasKey('data', $jsonResponse);

        foreach ($jsonResponse['data'] as $data) {
            $this->assertCarData($data);
        }

        $this->assertEquals($car->Id, $jsonResponse['data'][0]['Id']);
    }

    private function assertCarData(mixed $carData): void
    {
        $this->assertIsArray($carData);

        $this->assertArrayHasKey('Id', $carData);
        $this->assertArrayHasKey('RegNumber', $carData);
        $this->assertArrayHasKey('VIN', $carData);
        $this->assertArrayHasKey('Model', $carData);
        $this->assertArrayHasKey('Brand', $carData);
    }

    private function createCar(): Car
    {
        return $this->carBuilder->create()->getAndReset();
    }
}
