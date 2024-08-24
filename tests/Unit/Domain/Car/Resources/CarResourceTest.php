<?php

namespace Tests\Unit\Domain\Car\Resources;

use App\Domain\Car\Models\Car;
use App\Domain\Car\Resources\CarResource;
use Illuminate\Http\Request;
use Tests\Unit\UnitTestCase;

final class CarResourceTest extends UnitTestCase
{
    public function testToArray(): void
    {
        $car = new Car([
            'RegNumber' => 'Test reg',
            'VIN' => 'Test VIN',
            'Model' => 'Test model',
            'Brand' => 'Test brand',
        ]);
        $car->Id = 1;

        $resource = (new CarResource($car))->toArray(new Request());

        $this->assertIsArray($resource);
        $this->assertEquals(1, $resource['Id']);
        $this->assertEquals('Test reg', $resource['RegNumber']);
        $this->assertEquals('Test VIN', $resource['VIN']);
        $this->assertEquals('Test model', $resource['Model']);
        $this->assertEquals('Test brand', $resource['Brand']);
    }
}
