<?php

namespace App\Domain\Car\Resources;

use App\Domain\Car\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Car $resource
 */
final class CarResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Id' => $this->resource->Id,
            'RegNumber' => $this->resource->RegNumber,
            'VIN' => $this->resource->VIN,
            'Model' => $this->resource->Model,
            'Brand' => $this->resource->Brand,
        ];
    }
}
